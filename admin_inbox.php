<?php include 'admin_menu.php';?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath . '/classes/Cart.php');
include_once ($filepath. '/helpers/Format.php');
?>
<?php
$crt = new Cart();
$fm = new Format();

if(isset($_GET['shiftId'])){        // comanda confirmata de ADMIN
    $shiftId    = $_GET['shiftId'];
    $shift = $crt->productshifted($shiftId);
}

if(isset($_GET['delProId'])){       // comanda stearsa de ADMIN
    $delProId = $_GET['delProId'];
    $delOrder = $crt->DelproductOrder($delProId);
}
?>
<html>
<head>
    <link rel="stylesheet" href="admin_style.css">
    <title>Inbox</title>
</head>
<body><br><br>
    <center>
        <h2>Inbox</h2>
        <div class=""> 
            <?php
            if(isset($shift)){
                echo $shift;
            }
            if(isset($delOrder)){
                echo $delOrder;
            }
            ?>
            <table>
                <thead>
                    <tr>
                        <th >ID</th>
                        <th>Order Time</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Cust ID</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $getOrder = $crt->getAllOrderProduct();
                        if($getOrder){                                                
                            while($result = $getOrder->fetch_assoc()){
                    ?>
                    <tr class="">
                        <td ><?php echo $result['productId']?></td>
                        <td><?php echo $fm->formatDate($result['date'])?></td>
                        <td><?php echo $result['productName']?></td>
                        <td><?php echo $result['quantity']?></td>
                        <td><?php echo $result['price']?></td>
                        <td><?php echo $result['cmrId']?></td>
                        <td><a class="button" href="customer.php?custId=<?php echo $result['cmrId'];?>">View Details</a></td>
                    <?php
                        if($result['status']==0){?>
                            <td><a class="button" href="?shiftId=<?php echo $result['orderId'];?>">Sent</a></td>
                                <?php }elseif($result['status']==1){?>
                            <td class="button">Pending</td>
                                <?php } else { ?>
                            <td><a class="button" href="?delProId=<?php echo $result['orderId'];?>">Remove</a></td>
                                <?php }?>
                    </tr>
                <?php } }?>
            </tbody>
        </table>
       </div><br><br>
</body>
<style>
table, thead, tbody, td, th, tr{
    border:1px solid black;
    padding:10px
}
</style>
</html>
<?php include 'inc/footer.php' ?>
