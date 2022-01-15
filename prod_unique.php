<?php include 'inc/header.php' ?>
<?php // include 'inc/slider.php' ?>
<?php
if (isset($_GET['proId'])) {
    $id = preg_replace('/[^-a-z-A-Z-0-9_]/', '', $_GET['proId']);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'&& isset($_POST['submit'])){
    $quantity = $_POST['quantity'];
    $addCart = $ct->addToCart($quantity, $id);    
}
?>
<?php
    $cmrId =  Session::get("customerId"); 
    
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['wlist'])){
    
    $productId = $_POST['productId'];

    $saveWlist = $pd->saveWishList($cmrId,$productId); /// belong to the product class
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Unique products</title>
    </head>
    <body class="body">    
        <div class="main">
            <div class="container">
                <h3 class="h3"><b>Unique products</b></h3>
                <div class="row">
                    <?php
                        $getUpd = $pd->getAllUnique();
                        if($getUpd){   
                        while($result = $getUpd->fetch_assoc()){
                    ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="details.php?proId=<?php echo $result['productId'];?>">
                                    <div class="zoom">
                                        <img class="pic-1" src="admin/<?php echo $result['image'] ?>">
                                    </div>      
                                </a>
                                <ul class="social">
                                    <div class="add-cart">
                                        <li><a href="details.php?proId=<?php echo $result['productId'];?>"> <i class="fa fa-search"></i></a></li>
                                    </div>  
                                </ul>
                            </div>
                            <div class="product-content">
                                <h3 class="title">
                                    <a href="details.php?proId=<?php echo $result['productId'];?>"><?php echo $result['productName']; ?></a>
                                </h3>
                                <div class="price"><?php echo $result['price']; ?>€
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } } ?>
            </div>
        </div>
    </body>

<style>
h3.h3{
    text-align:center;
    margin:1em;
    text-transform:capitalize;
    font-size:1.7em;
    height:40px; 
    background-color: white
}
.product-grid{
    font-family: Raleway,sans-serif; 
    text-align: center; 
    padding: 0 0 0px;
    overflow: hidden; 
    position: relative;
    z-index: 1;
    width: 275px;
    margin: 10px 0 50px 0;
}
.product-grid .product-image{
    position: relative; 
    transition: all .3s ease 0s;
    width:100% 
}
.product-grid .product-image a{
    display: block;
}
.product-grid .product-image img{
    width: 100%; 
    height: 400px;
}
.product-grid .pic-1{
    opacity: 1; 
    transition: all .3s ease-out 0s; 
    height:180px; 
    width:300px;
}

.product-grid .social{ 
    width: 150px; 
    padding: 0; 
    margin: 0; 
    list-style: none; 
    opacity: 0; 
    transform: translateY(-50%) translateX(-50%); 
    position: absolute; 
    top: 60%; 
    left: 50%; 
    transition:  all .3s ease 0s;
}
.product-grid:hover .social{
    opacity: 1; 
    top: 50%
}
.product-grid .social li{
    display: inline-block
} 
.product-grid .social li a{
    color: white;
    background-color: black; 
    font-size: 16px; 
    line-height: 40px; 
    text-align: center; 
    height: 40px; 
    width: 40px;
    margin: 0 2px; 
    display: block; 
    position: relative; 
    transition: .3s ease-in-out;
}
.product-grid .social li a:hover{
    color: red;
    background-color: white
}

.product-grid .product-discount-label,.product-grid .product-new-label{
    color:#fff;
    background-color:#ef5777;
    font-size:12px;
    text-transform:uppercase;
    padding:2px 7px;
    display:block;
    position:absolute;
    top:10px;
    left:0
}

.product-grid .product-discount-label{
    background-color:#333;
    left:auto;
    right:0
}

.product-grid .product-content{
    background-color:#fff;
    text-align:center;
    padding:12px 10px;
    margin:0 auto;
    position:absolute;
    left:0;
    right:0;
    bottom:-27px;
    z-index:1;
    transition:all .3s
}
.product-grid:hover .product-content{
    bottom:0
}
.product-grid .title{
    font-size:13px;
    font-weight:400;
    letter-spacing:.5px;
    text-transform:capitalize;
    margin:0 0 10px;
    transition:all .3s ease 0s
}

.product-grid .title a{
    color:#828282
}
.product-grid .title a:hover,.product-grid:hover .title a{
    color:#ef5777
}

.product-grid .price{
    color:#333;
    font-size:17px;
    font-family:Montserrat,sans-serif;
    font-weight:700;
    letter-spacing:.6px;
    margin-bottom:8px;
    text-align:center;
    transition:all .3s
}


.product-grid .price span{
    color:#999;
    font-size:13px;
    font-weight:400;
    text-decoration:line-through;
    margin-left:3px;
    display:inline-block}


.zoom {
  transition: transform .2s; /* Animation */
}

.zoom:hover {
  transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}

</style>
</body>
</html>
<?php include 'inc/footer.php' ?>


