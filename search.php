<?php include 'inc/header.php' ?>
<?php
if(isset($_POST['product_search'])) {
    $search = $_POST['product_search'];
    $product_search = $pd->searchProductByUser($search); 
}
?>
<html>
<head>
    <title>Searched products</title>
</head>
<body>
    <div class="container-12">
        <div class="card card-info" style="border:none">
            <div class="card-title"><br>
                <div>
                    <h4 style="font-weight:bold; font-size:20px; text-align:center; background-color:#e8e8e8; height:40px; padding-top:5px">Searched Product</h4>
                </div>
            </div>        
            <div class="card-body">          
                <div class="row">
                    <?php
                        //$getProByCat = $pd->getProByCat($catid);
                        if ($product_search) {
                            
                            while ($result = $product_search->fetch_assoc()){
                    ?>
                            <div class="col-3">
                                <div>
                                    <a class="text-center" href="details.php?proId=<?php echo $result['productId']; ?>">
                                        <img src="admin/<?php echo $result['image'] ?>" alt="image" style="height:300px; width:240px"/>
                                    </a>
                                    <div class="row">                          
                                        <div class="column"><br>
                                            <div style="font-weight: bold;"><?php echo $result['productName'];?></div>
                                            <div ><p style="font-size:18px"><?php echo $result['price'];?>€</p></div>
                                        </div>
                                        <a class="button" href="details.php?proId=<?php echo $result['productId']; ?>">Details</a>
                                    </div>
                                </div>
                            </div>
                    <?php } }else { ?>
                        </div>
                        <p style="font-weight:bold; font-size:20px; text-align:center">Sorry, but we didn't find any products... <img src="images/sad.png" style="width:30px"></p> 
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>

<style>
    .row{
    padding:20px
}

.column {
  float: left;
  width: 40%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

.button {
    background-color: orange;  
    border: none;
    color: black;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    transition-duration: 0.8s;
    cursor: pointer;
    border-radius: 8px;
    font-weight: bold;
    float:left; 
    weight: 50%;
    height: 45px;
    margin-top:27px
    
}

.button:hover {
    background-color: black;
    color: white;
    text-decoration: none;
}
</style>
</html>
<?php include 'inc/footer.php' ?>
