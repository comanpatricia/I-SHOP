<?php ob_start();?>
<?php include 'inc/header.php' ;?>
<?php
    $login = Session::get("customerlogin");
    if($login==FALSE){
    header("Location:login.php");}
?>
<?php
    // order product of an user
    if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
    // customer id from tbl_customer table    
    $cmrId = Session::get("customerId");
    $insertOrder = $ct->orderProduct($cmrId);
    $deldata     = $ct->deleteCustomerCart();
    header("Location: success.php");
    ob_end_flush();
    }
?>
<html>
<head>
    <title>Offline Payment</title>
</head>
<body>
    <div class="container"><br>
        <center><h4>Order details</h4></center><br>
        <table class="table table-striped">
            <thead style="background-color:black">
                <tr class="text-white text-center font-weight-bold ">
                    <th>No</th>
                    <th>Product</th>                            
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>                            
                </tr>
            </thead>                            
            <tbody class=""> 
                <?php
                $getPro = $ct->getCartProduct();
                // product add in cart using user session id 
                if($getPro){
                    $i   = 0;
                    $sum = 0;
                    $qty = 0;

                    while($result = $getPro->fetch_assoc()){
                        $i++;                                    
                ?>
                            <tr class="text-center">
                                <td style="padding-top: 30px"><?php echo $i;?></td>
                                <td style="padding-top: 30px"><?php echo $result['productName'];?></td>
                                <td style="padding-top: 30px"><?php echo $result['price'].'€';?></td>
                                <td style="padding-top: 30px"><?php echo $result['quantity'];?></td>
                                <td style="padding-top: 30px ">
                <?php
                                $total = $result['price'] * $result['quantity'];
                                echo $total.'€';
                ?>              </td>
                            </tr>
                <?php
                            $qty = $qty + $result['quantity'];
                            $sum = $sum + $total;
                ?>
                <?php } }?>                        
            </tbody>
        </table>
        <table class="tbl table-striped">
            <tr>
                <th class="text-right">Sub Total :</th>
                <td><?php echo $sum.'€';?></td>
            </tr>
            <tr>
                <th class="text-right">VAT(10%) :</th>
                <td>
                    <?php
                        $vat = $sum * 0.1;
                        echo $vat;
                    ?>
                </td>
            </tr>
            <tr>
                <th class="text-right">Grand Total :</th>
                <td>
                    <?php                                
                        $total_sum = $sum + $vat;                                
                        echo $total_sum.'€';
                    ?>
                </td>
            </tr>
            <tr>
                <th class="text-right">Quantity :</th>
                    <td><?php echo $qty;?></td>
                </tr>
        </table>
    </div><br><br><br><br><br><br>
    <div class="text-center">
        <a href="?orderid=order" style="margin-top: 15px" class="button">Order</a>
        <a style="margin-top: 15px;color: white" class="button" onClick="window.open('invoice.php','SearchTip','width=700,height=630,resizable=yes,scrollbars=yes')">Download Invoice</a>
    </div><br>
</body>
<style>
.table{
    width: 800px;
    margin-left: 160px
}
.tbl{
    width : 400px; 
    border: 1px solid black;
    float:left;
    margin-left: 560px

}
.tbl tr td{
    padding: 3px;
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

.button1 {
  background-color: orange;  
  border: none;
  color: black;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.8s;
  cursor: pointer;
  border-radius: 8px;
  font-weight: bold;
}

.button1:hover {
  background-color: black;
  color: white;
  text-decoration: none;
}

</style>
</html>
<?php include 'inc/footer.php' ;



