<?php include 'inc/header.php' ;
?>
<?php
$login = Session::get("customerlogin");
if($login==FALSE){
header("Location:login.php");}

if(isset($_GET['confirmId'])){          //cand produsul este gata de livrarwe, clientul confirma
    $confirmId = $_GET['confirmId'];
    $confirm   = $ct->productshiftConfirm($confirmId);
}
?>

<html>
<head>
    <title>Order Details</title>
</head>
<body>
    <div class="main">
        <div class="container">
            <div class="row">
            <div style="font-size: 25px; margin: auto; padding:20px; color:black;">Details about your orders</div>
                <table class="table table-striped">
                    <thead style="background-color:black">
                        <tr class="text-white text-center font-weight-bold ">
                            <th>No</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>                            
                    <tbody class=""> 
                            <?php
                            // customer id from tbl_customer table
                            $customerid  = Session::get("customerId");
                            $getOrder = $ct->getOrderProduct($customerid);
                            // product details fetch from order table by customer id 
                            if($getOrder){
                                $i   = 0;
                                while($result = $getOrder->fetch_assoc()){
                                    $i++;                                    
                                    ?>
                                <tr class="text-center">
                                    <td style="padding-top: 30px"><?php echo $i;?></td>
                                    <td style="padding-top: 30px"><?php echo $result['productName'];?></td>
                                    <td><img src="admin/<?php echo $result['image'];?>" height="70" width="90" alt=""/></td>
                                    <td style="padding-top: 30px"><?php echo $result['quantity'];?></td>
                                    <td style="padding-top: 30px"><?php echo '$'.$result['price'];?></td>
                                    <td style="padding-top: 30px"><?php echo $fm->formatDate($result['date']);?></td>
                                    <td style="padding-top: 30px"><?php 
                                    if($result['status']==0){
                                        echo 'Pending';
                                    }elseif($result['status']==1){
                                         echo 'Sent';
                                    }else{
                                        echo 'Delivered';
                                    }?>
                                    </td>
                                    <?php if($result['status']==1){?>
                                    <td style="padding-top: 30px"> <a href="?confirmId=<?php echo $result['orderId'];?>">Received</a></td>
                                    <?php }elseif($result['status']==2){?>
                                    <td style="padding-top: 30px">Thank you</td>
                                    <?php }elseif($result['status']==0){?>
                                    <td style="padding-top: 30px">Not yet</td>
                                    <?php }?>
                                </tr>
                            <?php } }?>                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<?php include 'inc/footer.php' ;



