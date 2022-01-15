<?php
ob_start();

include 'inc/header.php' ;

$login = Session::get("customerlogin");
if($login==FALSE){
    header("Location:login.php");
    ob_end_flush();
}
?>
<html>
<head>
    <title>Payment Method</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3 class="text-center" style="margin-top: 25px">Choose the payment method you preffer</h3>
                <hr style="background-color:orange">
            </div>
        </div>  
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center" style="margin-top: 30px;">
                <a href="paymentonline.php" class="button" >Online Payment</a>
                <a href="paymentoffline.php" class="button">Offline Payment</a>
            </div>
            <div class="col-md-6 offset-md-3 text-center" style="margin-top: 10px;">
                <img src="images/card.png" class="img" style="width:60px; margin-right: 100px">
                <img src="images/money.png" class="img" style="width:75px">
            </div>
        </div>    
        <div class="text-center">
           <a href="cart.php" style="margin-top: 70px; background-color: orange; color:black" class="btn btn-dark">Previous</a>
        </div><br>           
    </div>
</body>
<style>
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
    transition-duration: 0.4s;
    cursor: pointer;
    border-radius: 8px;
}

.button:hover {
    background-color: orange;
    color: black;
    text-decoration: none;
    font-weight:bold;
}

</style>
</html>
<?php include 'inc/footer.php';


