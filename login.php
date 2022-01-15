<?php ob_start();?>
<?php include 'inc/header.php' ?>
<?php include 'classes/Adminlogin.php';?>

<?php
    $login =  Session::get("customerlogin");
    if($login==TRUE){
        header("Location: orderdetails.php");
        ob_end_flush();
    }
?>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])){
        $insertCustomer = $cmr->customerInsert($_POST);                 //Customer class
    }
?>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
    $loginCustomer = $cmr->customerlogin($_POST);                       //Customer class
    }
?>

<?php
    $al  = new Adminlogin();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $c_email  = $_POST['c_email'];
        $c_pass  = md5($_POST['c_pass']);    
        $logincheck = $al->adminlogin($c_email,$c_pass);
        if ($c_email == 'admin@gmail.com' || $c_pass == 'admin') {
            header('location: admin_index.php');	
        }
    }
?>
<html>
<head>
    <title>Login</title>
</head>
<body><center><br>
    <div class="container">
        <div class="">
            <div class="col-md-4">
                <?php
                    if(isset($loginCustomer)){
                        echo $loginCustomer;
                    }
                ?>
                <form action="" method="post"><br>
                    <p class="text-center font-weight-bold" style="font-style: italic; font-size:20px; "> Login</p>
                    <div class="form-group"><br>
                        <input type="email" id="em" class="form-control"  placeholder="Enter email" name="c_email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Enter password" name="c_pass">
                    </div><br>
                    <button type="submit" class="button" name="login">Sign In</button>
                </form>
            </div>
        </div><br>
        <div>Do you want to register? <a href="register.php" style="color:orange"><b>Click here</b></a></div>
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
<?php include 'inc/footer.php' ?>

