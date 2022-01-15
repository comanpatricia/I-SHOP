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
<body>
  <div class="container">
      <br>
      <div class="row">
          <div class="col-md-6 offset-md-3">
                  <h3 class="text-center font-weight-bold" style="margin-top: 15px;">Thank you!</h3>
                  <p>Thanks for your purchase. Received your order successfully. We will contact you ASAP
                      with delivery details. Here is your order details...<a href="orderdetails.php">
                      Click Here..</a></p>                       
                  <div class="text-center">
                      <a href="orderdetails.php" style="margin-top: 40px" class="button">Order details</a>
                  </div>
                  <br>
          </div>        
      </div>
      <br>             
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


