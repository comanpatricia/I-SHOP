<?php
    $filepath = realpath(dirname(__FILE__));
    
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');
?>
<?php
class Product {

    private $db;
    private $fm;

    public function __construct() {

        $this->db = new Database();         //creare obj
        $this->fm = new Format();           //creare obj
    }
    
    //inserare produs

    public function productInsert($data,$file){
        $productName = $this->fm->validation($data['productName']);     
        $catId       = $this->fm->validation($data['catId']);       
        $brandId     = $this->fm->validation($data['brandId']);     
        $body        = $this->fm->validation($data['body']);        
        $price       = $this->fm->validation($data['price']);       
        $keywords    = $this->fm->validation($data['keywords']);        
        $type        = $this->fm->validation($data['type']);        

        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);   
        $catId       = mysqli_real_escape_string($this->db->link, $data['catId']);
        $brandId     = mysqli_real_escape_string($this->db->link, $data['brandId']);
        $body        = mysqli_real_escape_string($this->db->link, $data['body']);
        $price       = mysqli_real_escape_string($this->db->link, $data['price']);
        $keywords    = mysqli_real_escape_string($this->db->link, $data['keywords']);
        $type        = mysqli_real_escape_string($this->db->link, $data['type']);
        
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div = explode('.', $file_name);        //desparte sirul si salveaza-l in array
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;
        
        if($productName==""||$catId==""||$brandId==""||$body==""||$price==""||$keywords==""||$file_name==""||$type=="")
                 {
                  $msg = "<span class = 'error'>Fields must not be empty</span>";
                  return $msg;
                 }
                
        else if ($file_size >1048567) {
                 echo "<span class='error'>Image Size should be less then 1MB!
                 </span>";
                }
                
        else if (in_array($file_ext, $permited) === false) {
                 echo "<span class='error'>You can upload only:-"
                 .implode(', ', $permited)."</span>";
                }
                
        else{
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "INSERT INTO tbl_product(productName,catId,brandId,body,price,image,keywords,type) VALUES('$productName','$catId','$brandId','$body','$price','$uploaded_image','$keywords','$type')"; 
                    $pdinsert = $this->db->insert($query);
                        if($pdinsert){
                          
                           $msg = "<span class='success'>Product inserted successfully</span>";
                           return $msg;
                       }else{
                           $msg = "<span class = 'error'>Product insertion is failed</span>";
                           return $msg;
                       }
                }
    }
    
    //selectarea tuturor produselor, de sezon/unice

    public function getAllProduct(){         //folosind alias
        
        $query = "SELECT p.*,c.catName,b.brandName
                  FROM tbl_product as p,tbl_category as c,tbl_brand as b
                  WHERE p.catId = c.catId AND p.brandId = b.brandId
                  ORDER BY p.productId DESC";
        
        $result = $this->db->select($query);
        return $result;
    }

    public function getAllSeason(){         //folosind alias
        
        $query = "SELECT p.*,c.catName,b.brandName
                  FROM tbl_product as p,tbl_category as c,tbl_brand as b
                  WHERE p.catId = c.catId AND p.brandId = b.brandId AND sales='offers'
                  ORDER BY p.productId DESC";
        
        $result = $this->db->select($query);
        return $result;
    }

    public function getAllUnique(){         //folosind alias
        
        $query = "SELECT p.*,c.catName,b.brandName
                  FROM tbl_product as p,tbl_category as c,tbl_brand as b
                  WHERE p.catId = c.catId AND p.brandId = b.brandId AND type='0'
                  ORDER BY p.productId DESC";
        
        $result = $this->db->select($query);
        return $result;
    }

    //preluare broduse in functie de ID

    public function getProductById($id){
        $query = "SELECT * FROM tbl_product WHERE productId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    //update produse

    public function productupdate($data,$file,$id) {
        $productName = $this->fm->validation($data['productName']);     
        $catId       = $this->fm->validation($data['catId']);       
        $brandId     = $this->fm->validation($data['brandId']);     
        $body        = $this->fm->validation($data['body']);        
        $price       = $this->fm->validation($data['price']);       
        $keywords    = $this->fm->validation($data['keywords']);        
        $type        = $this->fm->validation($data['type']);        

        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);   
        $catId       = mysqli_real_escape_string($this->db->link, $data['catId']);
        $brandId     = mysqli_real_escape_string($this->db->link, $data['brandId']);
        $body        = mysqli_real_escape_string($this->db->link, $data['body']);
        $price       = mysqli_real_escape_string($this->db->link, $data['price']);
        $keywords    = mysqli_real_escape_string($this->db->link, $data['keywords']);
        $type        = mysqli_real_escape_string($this->db->link, $data['type']);
        
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div = explode('.', $file_name);        //desparte sirul si salveaza-l in array
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;
        
        if($productName==""||$catId==""||$brandId==""||$body==""||$price==""||$keywords==""||$type=="")
                 {
                
                  $msg = "<span class = 'error'>Fields must not be empty</span>";
                  return $msg;
               
                 }
          else{
               if(!empty($file_name)){          // verifica daca exista o poza
                
                 if ($file_size >1048567) {
                         echo "<span class='error'>Image Size should be less then 1MB!
                         </span>";
                        }

                else if (in_array($file_ext, $permited) === false) {
                         echo "<span class='error'>You can upload only:-"
                         .implode(', ', $permited)."</span>";
                        }

                   else{  
                            move_uploaded_file($file_temp, $uploaded_image);
                            $query = "UPDATE tbl_product
                                      SET
                                      productName = '$productName',
                                      catId       = '$catId',
                                      brandId     = '$brandId',
                                      body        = '$body',
                                      price       = '$price',
                                      image       = '$uploaded_image',
                                      keywords    = '$keywords',
                                      type        = '$type'
                                          
                                  WHERE productId = '$id' ";    
                                       
                            $pdupdate = $this->db->update($query);
                                if($pdupdate){

                                   $msg = "<span class='success'>Product updated successfully</span>";
                                   return $msg;
                               }else{
                                   $msg = "<span class = 'error'>Product updated is failed</span>";
                                   return $msg;
                               }
                        }
                    }
                    else{       // adaugare de poza
                             $query = "UPDATE tbl_product
                                      SET
                                      productName = '$productName',
                                      catId       = '$catId',
                                      brandId     = '$brandId',
                                      body        = '$body',
                                      price       = '$price',
                                      keywords    = '$keywords',
                                      type        = '$type'
                                          
                                  WHERE productId = '$id' ";    
                                       
                            $pdupdate = $this->db->update($query);
                                if($pdupdate){

                                   $msg = "<span class='success'>Product updated successfully</span>";
                                   return $msg;
                               }else{
                                   $msg = "<span class = 'error'>Product updated is failed</span>";
                                   return $msg;
                               }
                    }
            }
       }

       //stergere produs dupa ID

       public function delProById($id){
           $query = "SELECT * FROM tbl_product WHERE productId = '$id'";
           $getdata = $this->db->select($query);
           
           if($getdata){
               while($delImg = $getdata->fetch_assoc()){
                   $dellink = $delImg['image'];
                   unlink($dellink);
               }
           }
           
          $query = "DELETE FROM tbl_product WHERE productId = '$id'";
          $deletedata = $this->db->delete($query);
          if($deletedata){
              
               $msg = "<span class='success'>Product deleted successfully</span>";
               return $msg;
           }else{
               $msg = "<span class = 'error'>Product not deleted!!</span>";
               return $msg;
           }
       }
       
       //preluare produse

       public function getUniqueProduct(){
        $query = "SELECT * FROM tbl_product WHERE type='0' ORDER BY productId DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
       }
       
       public function getNewProduct() {
        $query = "SELECT * FROM tbl_product ORDER BY productId ASC LIMIT 4";
        $result = $this->db->select($query);
        return $result; 
       }

       public function getSeasonProduct() {
        $query = "SELECT * FROM tbl_product WHERE sales='offers' ORDER BY productId DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result; 
       }
       
       public function getSingleProduct($id){
            $query = "SELECT p.*,c.catName,b.brandName
                      FROM tbl_product as p,tbl_category as c,tbl_brand as b
                      WHERE p.catId = c.catId AND p.brandId = b.brandId 
                      AND p.productId = '$id'";
        
        $result = $this->db->select($query);
        return $result;
       }

       //BRAND PAGE
       public function getlatestfromStradivarius(){
           
        $query = "SELECT * FROM tbl_product WHERE brandId='3' ORDER BY productId DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
       }

       public function getlatestfromBershka(){
               
        $query = "SELECT * FROM tbl_product WHERE brandId='2' ORDER BY productId DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;  
       }

       public function getlatestfromPullBear(){
                    
        $query = "SELECT * FROM tbl_product WHERE brandId='1' ORDER BY productId DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;  
       }

       public function getlatestfromZara(){
           
        $query = "SELECT * FROM tbl_product WHERE brandId='4' ORDER BY productId DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
       }

       public function getlatestfromHM(){
          
        $query = "SELECT * FROM tbl_product WHERE brandId='5' ORDER BY productId DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;  
       }
       
       //preluare produse dupa categorie

       public function getProByCat($catid){
        $catid = mysqli_real_escape_string($this->db->link,$catid);
        $query = "SELECT * FROM tbl_product WHERE catId = '$catid'";
        $result = $this->db->select($query);
        return $result; 
       }

       // WISHLIST

       public function saveWishList($cmrId,$productId){
       $cmrId = $this->fm->validation($cmrId);      
       $productId = $this->fm->validation($productId);      
    
       $cmrId = mysqli_real_escape_string($this->db->link,$cmrId);
       $productId = mysqli_real_escape_string($this->db->link,$productId);

       $checkQuery = "SELECT * FROM tbl_wlist WHERE productId = '$productId' AND cmrId = '$cmrId'";
       $getCompare = $this->db->select($checkQuery);
       if ($getCompare){
           $msg = "<span style='color:red; margin-left:40%'>Already added to your wishlist!</span>";
           return $msg;
       } 
       
        $query  = "SELECT * FROM tbl_product WHERE productId = '$productId'";
        $result = $this->db->select($query)->fetch_assoc();
        if($result){
                $productId = $result['productId'];
                $productName = $result['productName'];
                $price = $result['price'];
                $image = $result['image'];
            
           $query = "INSERT INTO tbl_wlist(cmrId,productId,productName,price,image) VALUES('$cmrId','$productId','$productName','$price','$image')";
           $InsertProduct = $this->db->insert($query);
           if($InsertProduct){
              
               $msg = "<span style='color:red; margin-left:38%'>Added to wishlist! Check Wishlist page.</span>";
               return $msg;
           }else{
               $msg = "<span style='color:red; margin-left:40%'>Product cannot be added!!</span>";
               return $msg;
               }
           } 
       }
       
       public function getWlistData($customerid){
        $query  = "SELECT * FROM tbl_wlist WHERE cmrId='$customerid' ORDER BY wlistId DESC";
        $result = $this->db->select($query);
        return $result;           
       }
       
       public function delWlistData($customerid,$productId){
          $query = "DELETE FROM tbl_wlist WHERE cmrId = '$customerid' AND productId='$productId'";
          $deletedata = $this->db->delete($query);
       }
       
       public function searchProductByUser($search){
        $query  = "SELECT * FROM tbl_product WHERE keywords LIKE '%$search%'";
        $result = $this->db->select($query);
        return $result;
       }
 }
