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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online payment</title>
</head>
<body>
    <br>
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
    <div class="row">
        <div class="column">
                <div class="card">
                    <img src="https://seeklogo.com/images/V/VISA-logo-62D5B26FE1-seeklogo.com.png" class="logo-card">
                    <label>Card number:</label>
                    <input id="user" type="text" class="input cardnumber" placeholder="1234 5678 9000 0000" maxlength="16" required>
                    <label>Name:</label>
                    <input class="input name" placeholder="Coman Patricia" required>
                    <label class="toleft">CCV:</label>
                    <input class="input toleft ccv" placeholder="123" maxlength="3" required>
                </div>
            </div>
        <div class="column"><br><br>
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
        </div>
    </div><br><br>
    <div class="text-center">
        <a href="?orderid=order" style="margin-top: 15px" class="button">Order</a>
        <a style="margin-top: 15px;color: white" class="button" onClick="window.open('invoice.php','SearchTip','width=700,height=630,resizable=yes,scrollbars=yes')">Download Invoice</a>
    </div>
    <br>
</body>

<style>
.table{
    width: 800px;
    margin-left: 360px
}
.tbl{
    width : 400px; 
    border: 1px solid black;
    float:left;

}
.tbl tr td{
    padding: 3px;
}

.column {
  float: left;
  width: 50%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

@import url('https://fonts.googleapis.com/css?family=Work+Sans');

.card{
  background:#16181a;  
  border-radius:14px; 
  max-width: 370px; 
  display:block; 
  margin:auto;
  padding:60px; 
  padding-left:20px; 
  padding-right:20px; 
  margin-left:376px;
}

.logo-card{
    max-width:50px; 
    margin-bottom:15px; 
    margin-top: -19px;
}

label{
    display:flex; 
    font-size:10px; 
    color:white; 
    opacity:.4;
}

input{
    background:transparent; 
    border:none; 
    border-bottom:1px solid transparent; 
    color:white; 
    transition: border-bottom .4s;
}
input:focus{
    border-bottom:1px solid orange; 
    outline:none;
}

.cardnumber{
    display:block; 
    font-size:20px; 
    margin-bottom:8px; 
}

.name{
    display:block; 
    font-size:15px; 
    max-width: 200px; 
    float:left; 
    margin-bottom:15px;
}

.toleft{
    float:left;
}
.ccv{
    width:50px; 
    margin-top:-5px; 
    font-size:15px;
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

html,
body {
	overflow-x: hidden; /* Hide horizontal scrollbar */
}
</style>
</html> 

<?php include 'inc/footer.php' ;
