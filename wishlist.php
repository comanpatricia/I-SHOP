<?php
ob_start();
?>
<?php include 'inc/header.php'; ?>
<?php
$customerid = Session::get("customerId");
if(isset($_GET['delwlistproId'])){
    $productId = $_GET['delwlistproId'];
    $delWlist = $pd->delWlistData($customerid,$productId);
}
?>

<html>
<head>
    <title>Your wishlist</title>
</head>
<body>
<center><br>
    <div class="main" style="width:80%">
        <div class="content">
            <div class="font-weight-bold" style="font-size: 25px; color:black">Your wishlist</div><br>
                <?php
                    $customerid = Session::get("customerId");
                    $getWlist = $pd->getWlistData($customerid);
                    // product add in cart using user session id 
                    if($getWlist){
                        $i   = 0;
                        while($result = $getWlist->fetch_assoc()){
                            $i++;                                    
                ?>
                            <div class="text-center">
                                <div class="row">
                                    <div class="column" style="margin-left:300px">
                                        <div><img src="admin/<?php echo $result['image'];?>" height="400" width="300" alt=""/></div>
                                    </div>
                                    <div style="font-size:20px; margin-top:70px; margin-left:70px">
                                        <div style="padding-top: 30px; margin-right:10px"><?php echo $result['productName'];?></div>
                                        <div style="padding-top: 30px; margin-right:10px"> <?php echo $result['price'].'€';?></div>
                                        <div style="padding-top: 30px; margin-right:10px">
                                            <a href="details.php?proId=<?php echo $result['productId'];?>" class="buy">Buy Now</a>  ||
                                            <a href="?delwlistproId=<?php echo $result['productId'];?>" class="remove">Remove</a> 
                                        </div>                                        
                                    </div>
                                </div><br>
                            </div>
                <?php }} ?>
            </div><br><br>
            <div class="shopping">
                <div class="shopleft" style="width: 100%;text-align: center;">
                <a><img src="images/cart.png" style="width:40px"></a>
                <a href="index.php" class="back" style="color:black; font-size: 20px"><b><< Back to shopping</b></a>
            </div>
        </div>
    </div>  	
</center>
</body>
<style>
.back:hover{
    color: orange;
    text-decoration: none;
}

.buy{
    text-decoration: none;
    color: black;
    font-weight: bold;
}

.remove{
    text-decoration: none;
    color: red;
    font-weight: bold;
}
.buy:hover{
    text-decoration: none;
    color: orange;
    font-weight: bold;
}

.remove:hover{
    text-decoration: none;
    color: orange;
    font-weight: bold;
}
</style>
</html>
<?php include 'inc/footer.php' ;


