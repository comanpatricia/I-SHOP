<?php
$filepath = realpath(dirname(__FILE__));
    include_once ($filepath . '/../lib/Database.php');
    include_once ($filepath . '/../helpers/Format.php');
?>
<?php
class Cart{

    private $db;
    private $fm;
    public function __construct() {

        $this->db = new Database();                     //creare obj
        $this->fm = new Format();                       //creare obj
    }

    public function addToCart($quantity, $id) {
        $quantity = $this->fm->validation($quantity);   //validare
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $productId = mysqli_real_escape_string($this->db->link, $id);

        $sId = session_id();                             //unic in toate browserele si pt toti userii

        $query = "SELECT * FROM tbl_product WHERE productId = '$productId'";
        $result = $this->db->select($query)->fetch_assoc();

        $productName = $result['productName'];
        $price = $result['price'];
        $image = $result['image'];

        //verificam daca produsul nu cumva este ales deja

        $checkQuery = "SELECT * FROM tbl_cart WHERE productId = '$productId' AND sId = '$sId'";
        $getPro = $this->db->select($checkQuery);
        if ($getPro){
            $msg = "<span style='color:red; margin-left:40%'>This product is already added!</span>";
            return $msg;
        } else{
            $query = "INSERT INTO tbl_cart(sId,productId,productName,price,quantity,image) 
                    VALUES('$sId','$productId','$productName','$price','$quantity','$image')";
            $cartInsert = $this->db->insert($query);
            if ($cartInsert){                
               echo "<script>window.location = 'cart.php';</script>";                
            }else{                
                header("Location:404.php");
            }
        }
    }

    // product show in cart page of an user

    public function getCartProduct() {
        $sId    = session_id();
        $query  = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
        
    }

    // quantity update using cartId

    public function UpdateCartQuantity($cartId, $quantity) {

        $cartId = $this->fm->validation($cartId); /// validation
        $quantity = $this->fm->validation($quantity); /// validation
        $cartId = mysqli_real_escape_string($this->db->link, $cartId);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);

        $query = "UPDATE tbl_cart
                  SET
                  quantity = '$quantity'
                  WHERE cartId = '$cartId' ";

        $updateQuantity = $this->db->update($query);
        if ($updateQuantity) {
            header("Location: cart.php");           
        }else{
            $msg = "<span class = 'error'>Quantity update is failed</span>";
            return $msg;
        }
    }

    /// delete product from cart

    public function delCartProduct($delpro) {
        $delpro = $this->fm->validation($delpro); /// validation

        $delpro = mysqli_real_escape_string($this->db->link, $delpro);
        $query = "DELETE FROM tbl_cart WHERE cartId = '$delpro'";
        $deletedata = $this->db->delete($query);
        if ($deletedata) {
            echo "<script>window.location = 'cart.php';</script>";
        }else{
            $msg = "<span class = 'error'>Product not deleted!!</span>";
            return $msg;
          }
    }
    
    // daca nu se afla nimic in cos
    
    public function checkCartTable(){
        $sId    = session_id();
        $query  = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
    }

    // cosul se cumparaturi se sterge dupa cumparare sau la distrugerea sesiunii

    public function deleteCustomerCart() {
        $sId = session_id();
        $query = "DELETE FROM tbl_cart WHERE sId = '$sId'";
        $this->db->delete($query);
    }

    //insiruirea produselor din cosul cumparatorilor in functie de sesiune
    //adaugarea produselor la tabelul comenzilor in functie de ID-ul clientului 

    public function orderProduct($cmrId){
        $sId    = session_id();
        $query  = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
        $getPro = $this->db->select($query);
        if($getPro){
            while($result = $getPro->fetch_assoc()){
                $productId = $result['productId'];
                $productName = $result['productName'];
                $quantity = $result['quantity'];
                $price = $result['price']*$quantity;
                $image = $result['image'];
            
           $query = "INSERT INTO tbl_order(cmrId,productId,productName,quantity,price,image) VALUES('$cmrId','$productId','$productName','$quantity','$price','$image')";
           $InsertOrder = $this->db->insert($query);    
                
            }
        }
        
    }
    // cand un client intra si comanda de mai multe ori

    public function payableAmount($customerid){
        $query  = "SELECT * FROM tbl_order WHERE cmrId = '$customerid' AND date = now()";
        $result = $this->db->select($query);
        return $result;     
    }

    //produse vizibile folosind sesiunea la comenzi
    public function getOrderProduct($customerid){
        $query  = "SELECT * FROM tbl_order WHERE cmrId = '$customerid' ORDER BY date DESC";
        $result = $this->db->select($query);
        return $result;
    }
    
    //verifica comanda in functie de ID
    
    public function checkOrder($customerid){
         $query  = "SELECT * FROM tbl_order WHERE cmrId = '$customerid'";
         $result = $this->db->select($query);
         return $result; 
    }
    
    // toate produsele afisate in admin_inbox.php

    public function getAllOrderProduct(){
         $query  = "SELECT * FROM tbl_order";
         $result = $this->db->select($query);
         return $result; 
    }

    // pt produse trimise

    public function productshifted($shiftId){
         $shiftId = $this->fm->validation($shiftId);
          
        $shiftId = mysqli_real_escape_string($this->db->link, $shiftId); 
        $query = "UPDATE tbl_order
                  SET 
                  status = 1 
                  WHERE orderId='$shiftId'";
                   
           $orderupdate = $this->db->update($query);
           if($orderupdate){              
               $msg = "<span class='success'>Updated successfully</span>";
               return $msg;
           }else{
               $msg = "<span class = 'error'>Update failed</span>";
               return $msg;
           }
    }

    // cand comanda va fi confirmata, adminul va sterge de la inbox

    public function DelproductOrder($delProId){
          $query = "DELETE FROM tbl_order WHERE orderId = '$delProId'";
          $deletedata = $this->db->delete($query);
          if($deletedata){
              
               $msg = "<span class='success'>Data deleted successfully</span>";
               return $msg;
           }else{
               $msg = "<span class = 'error'>Data not deleted!!</span>";
               return $msg;
           }        
    }

    // clientul confirma comanda

    public function productshiftConfirm($confirmId){
        $confirmId = $this->fm->validation($confirmId);
          
        $confirmId    = mysqli_real_escape_string($this->db->link, $confirmId); 
        $query = "UPDATE tbl_order
                  SET 
                  status = 2 
                  WHERE orderId='$confirmId'";
                   
           $orderupdate = $this->db->update($query);
           if($orderupdate){              
               $msg = "<span class='success'>updated successfully</span>";
               return $msg;
           }else{
               $msg = "<span class = 'error'>Update failed</span>";
               return $msg;
           }
    }
    
}