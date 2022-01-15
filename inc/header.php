<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath . '/../lib/Session.php');
Session::init();
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../helpers/Format.php');

spl_autoload_register(function($class) {
     include_once "classes/" . $class . ".php";   
});

$db  = new Database();
$fm  = new Format();
$ct  = new Cart();
$pd  = new Product();
$cat = new Category();
$cmr = new Customer();

?>

<!DOCTYPE HTML>
<head>
    <link rel="shortcut icon" href="images/icon.jpg"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body id="main">
    <center>
        <div class="header_to">
            <div class="logo" style="width:10%">
                <img src="images/shopp.png" alt="Logo is not available right now" width="100%">
            </div>
        </div>
        <div class="wrap">
            <div class="move">
                <div class="slide">
                    <div>Today's the day: FREE SHIPPING.</div>
                </div>
                <div class="slide">
                    <div>We've extended our returns period to 60 days.</div>
                </div>
                <div class="slide">
                    <div>Soon: The I-SHOP App.</div>
                </div>
                <div class="slide">
                    <div>Shopping and paying safely online during the pandemic.</div>
                </div>
                <div class="slide">
                    <div>Register now to be up to date with our news and discounts.</div>
                </div>
            </div>
        </div>
    </center>
    <div>
        <div class="header_top">
            <nav class="navbar navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand" href="index.php" style="color:black"><b>I-SHOP</a>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <div class="nav navbar-nav" style="text-decoration:none;">
                            <div ><a href="blog.php" style="padding:15px; color:black; text-decoration:none">Blog</a></div>
                            <div ><a href="despre.php" style="padding:5px; color:black; text-decoration:none">About</b></a></div>
                        </div>
                    </div>
                    <i class="fa fa-search" id="search" style="color: black"> </i>
                    <form class="form-inline mr-auto" id="form" action="search.php" method="post" target="_self">
                        <div class="form-group">
                            <input type="text" name="product_search" placeholder="search for products..." style="padding:6px; background:white; border:none; text-value:black; width:300px; background-image: linear-gradient(to right, white,white, #e8e8e8)" minlength="3"> 
                        </div>
                    </form>             
                    <div class="clear"></div>
                            <?php       //cosul de cumparaturi se sterge automat cand sesiunea este distrusa
                            if(isset($_GET['cId'])){
                            $customerid = Session::get("customerId");
                            $deldata = $ct->deleteCustomerCart();
                            SESSION::destroy();                    
                        }?> 
                    </div>
                <div class="clear"></div>
                <?php
                    $login = Session::get("customerlogin");
                    if($login==FALSE)
                {?>
                    <a href="login.php" style="padding:7px; color: black; background:#a8a2a2"><b>Login here</b></a>    
                <?php }else{                            
                ?>                      
                    <a href="?cId=<?php Session::get("customerId");?>" style="padding:7px; border:none; color: black; background:#a8a2a2"><b>Logout</b></a>
                <?php } ?>
            </nav>
        </div>
        <nav class="navbar navbar-expand-sm" style="background-color: black">
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">      
                <span onclick="openNav()">
                    <img src="images/arrow1.png" style=" width:30px; margin: 0 10 0 10px">
                </span>          
                <a class="nav-item nav-link text-white" href="topbrands.php">Brands</a> 
                <?php
                    $customerid = Session::get("customerId");
                    // if user is logged in and buy products then order will visible using session
                    $checkOrder = $ct->checkOrder($customerid);
                    if($checkOrder){
                ?>                  
                        <a class="nav-item nav-link text-white" href="orderdetails.php">Orders</a> 
                <?php }?>
                    
                <?php
                    $login = Session::get("customerId");
                    // if user is logged in,then profile will visible using session
                    if($login==TRUE){
                ?>
                        <a class="nav-item nav-link text-white" href="profile.php">Profile</a>        
                <?php } ?>
                      
                <?php 
                    $customerid = Session::get("customerId");
                    $checkWlist = $pd->getWlistData($customerid);
                    // product add in cart using user session id 
                    if($checkWlist){ 
                ?>       
                    <a class="nav-item nav-link text-white" href="wishlist.php">Wishlist</a> 
                <?php }?>
                <a class="nav-item nav-link text-white" href="contact.php">Contact</a>
                    
            </div>
            <div class="header_top_right" style="display:inline">
                <div style="width:210px; margin: 0 0 5px 0; color: black;" > 
                    <div class="fa fa-shopping-cart" style="color: white; font-size:20px;">
                        <a href="cart.php" title="View my shopping cart">
                            <span class="cart_title" style="color: white; padding:9px"> 
                                <span class="no_product" >
                                    <?php
                                        $getdata = $ct->checkCartTable();
                                        if($getdata){
                                            $sum = SESSION::get("sum");
                                            $qty = SESSION::get("qty");
                                            
                                            echo  $sum.'€' . ' | ' . $qty . " item/s"; 
                                        }else{    
                                            echo 'is empty';
                                        }?>
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>    
            <div>   
        </nav> 

        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>            
            <a href="index.php">Home</a>
            <a href="despre.php">About us</a>
            <a href="prod_products.php">All products</a>
            <a href="prod_sales.php">This season</a>
            <a href="prod_unique.php">Unique products</a>
        </div> 
    </div> 
</body>

<style>


.header_to{
    background: #e8e8e8;
    padding: 20px;
}
.header_top{
    background: #e8e8e8;
    padding: 5px;
    /*border: solid 2px #ded8d7; */
}

.header-dark {
  background-color: #ded8d7;
  padding-bottom:80px;
}

@media (min-width:768px) {
  .header-dark {
    padding-bottom:120px;
  }
}

.main, .body{
    background: white;   
}

main, body{
    background: white;   
}

#search{
    padding:10px;
    border: 1px black
    
}


/*  NAV */
.sidenav {
  height: 100%; /* 100% Full-height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  background-color: black; /* Black*/
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 60px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
}

/* The navigation menu links */
.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 19px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
  color: #f1f1f1;
}

/* Position and style the close button (top right corner) */
.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
  transition: margin-left .5s;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.main, .body{background: white;
}

/* Announcements slider */
.wrap {
    width:100%;
    height: 40px;
    background: black;
    color: white;
    overflow: hidden;
}

.move {
    display: flex;
    position: relative;
    right: 0;
    top: 0;
}

.slide {
    width: 100%;
    flex-shrink: 0;
    padding: 10px;
}

@keyframes slideh {
    0% {right: 0;}
    15% {right: 0;}
    21% {right: 100%;}
    37% {right: 100%;}
    43% {right: 200%;}
    50% {right: 200%;}
    58% {right: 300%;}
    74% {right: 300%;}
    80% {right: 400%;}
    98% {right: 400%;}
    100% {right: 0;}
}

.move {animation: slideh linear 30s infinite;} 
.move:hover {animation-play-state: paused}

</style>

<script>
/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}


</script>
