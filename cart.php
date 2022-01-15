<?php
ob_start();
?>
<?php include 'inc/header.php'; ?>
<?php
if (isset($_GET['delpro'])){                                        // stergere produs din cos

    $delpro    = preg_replace('/[^-a-z-A-Z-0-9_]/', '',$_GET['delpro']);
    $delCartPd = $ct->delCartProduct($delpro);
}?>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $cartId = $_POST['cartId'];
    $quantity = $_POST['quantity'];         
    $updateCart = $ct->UpdateCartQuantity($cartId,$quantity);       // update cantitate produs in cos

    if($quantity <= 0){                                             //daca utilizatorul introduce valoare negativa sau 0
        $delCartPd = $ct->delCartProduct($cartId);
    }
}?>

<?php
    if (!isset($_GET['id'])){                                       // code for reload the page to get the session
    echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";   // refresh the page, here we can use other value instead of id,it's not compulsory

}?>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
<div class="main">
    <div class="content">
        <div class="cartoption"><center>	
            <div class="cartpage" style="width:70%">
                <div class=" font-weight-bold" style="font-size: 25px; text-align:center; padding: 20px">Your cart</div>
                    <?php
                    if(isset($updateCart)){                         //mesaj update cos  
                        echo $updateCart;
                    }
                    if(isset($delCartPd)){
                        echo $delCartPd;
                    }?>
                    <table class="table">                          
                        <tbody> 
                            <?php
                                $getPro = $ct->getCartProduct();
                                if($getPro){                         // produs adaugat in cos utilizand ID-ul sesiunii clientului 

                                    $i   = 0;
                                    $sum = 0;
                                    $qty = 0;

                                    while($result = $getPro->fetch_assoc()){
                                        $i++;                                    
                            ?>
                                    <tr class="text-center">
                                        <td style="padding-top: 70px"><?php echo $i;?></td>
                                        <td><img src="admin/<?php echo $result['image'];?>" height="150" width="120" alt=""/></td>
                                        <td style="padding-top: 70px"><?php echo $result['productName'];?></td>
                                        <td style="padding-top: 70px"><?php echo $result['price'].'€';?></td>
                                        <td style="padding-top: 60px">
                                            <form action="" method="post">
                                                <input type="hidden" name="cartId" value="<?php echo $result['cartId']; ?>"/>
                                                <input type="number" name="quantity"  value="<?php echo $result['quantity']; ?>"/>
                                                <input class="button" type="submit" name="submit" value="Update"/>
                                            </form>
                                        </td>
                                        <td style="padding-top: 70px ">
                                            <?php
                                                $total = $result['price'] * $result['quantity'];
                                                echo $total.'€';
                                            ?>
                                        </td>
                                        <td style="padding-top: 70px">
                                            <a onclick="return confirm('Are you sure to delete')" href="?delpro=<?php echo $result['cartId'];?>">X</a>
                                        </td>
                                    </tr>
                                    <?php
                                        $qty = $qty + $result['quantity'];
                                        $sum = $sum + $total;
                                        SESSION::set("sum",$sum);
                                        SESSION::set("qty",$qty);
                                    ?>
                            <?php } }?>                        
                        </tbody>
                    </table>
                <?php
                    $getdata = $ct->checkCartTable();
                    if($getdata){                                     // verifica daca produsul exista
                ?>
                <table style="float:right;text-align:center;" width="30%">
                    <tr>
                        <th>Sub Total :</th>
                        <td><?php echo $sum.'€';?></td>
                    </tr>
                    <tr>
                        <th>VAT(10%) :</th>
                        <td>
                            <?php
                                $vat = $sum * 0.1;
                                echo $vat;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Grand Total :</th>
                        <td>
                            <?php                                
                                $total_sum = $sum + $vat;                                
                                echo $total_sum.'€';
                            ?>
                        </td>
                    </tr>
                </table>
                <?php
                    }else{
                        header("Location: index.php");
                        ob_end_flush();
                    }
                ?>                                       
            </div><br><br><br><br><br><br>
            <div class="shopping">
                <div class="shopleft">
                    <a><img src="images/cart.png" style="width:40px"></a>
                    <a href="index.php" class="back" style="color:black; font-size: 20px"><b><< Back to shopping</b></a>
                </div><br><br>
                <div class="shopright">
                    <a href="payment.php" class="back" style="color:black; font-size: 20px"><b>Continue to checkout >></b></a>
                    <img src="images/checkout.png" alt="" style="width: 40px"/>
                </div>
            </div>
        </div>  	
    </div>
</body>
<style>
.back:hover{
    color: orange;
    text-decoration: none;
}
.button {
  background-color: black;  
  border: none;
  color: white;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.8s;
  cursor: pointer;
  border-radius: 8px;
}

.button:hover {
  background-color: orange;
  color: black;
  text-decoration: none;
}
</style>
</html>
<?php include 'inc/footer.php' ;


