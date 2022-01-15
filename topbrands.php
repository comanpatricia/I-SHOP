<?php include 'inc/header.php' ?>
<html>
<head>
    <title>Top brands</title>
</head>
<body>
    <div class="container-12">
        <div class="center"><img src="images/zara.png" style="width:120px"></div>
            <div class="card-body">          
                <div class="row">
                    <?php
                        $getZara = $pd->getlatestfromZara();
                        if ($getZara){
                            while ($result = $getZara->fetch_assoc()){
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
                    <?php } }?>
                </div>
            </div>
            <div class="center"><img src="images/bershka.png" style="width:120px"></div>             
            <div class="card-body">          
                <div class="row">
                    <?php
                        $getBershka = $pd->getlatestfromBershka();
                        if ($getBershka) {
                            while ($result = $getBershka->fetch_assoc()) {
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
                    <?php } }?>
                </div>
            </div>
            <div class="center"><img src="images/stradivarius.png" style="width:120px"></div>             
            <div class="card-body">          
                <div class="row">
                    <?php
                        $getStradivarius = $pd->getlatestfromStradivarius();
                        if ($getStradivarius) {
                            while ($result = $getStradivarius->fetch_assoc()) {
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
                    <?php } }?>
                </div>
            </div>
            <div class="center"><img src="images/pullbear.png" style="width:120px"></div>             
            <div class="card-body">          
                <div class="row">
                    <?php
                        $getPullBear = $pd->getlatestfromPullBear();
                        if ($getPullBear) {
                            while ($result = $getPullBear->fetch_assoc()) {
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
                    <?php } }?>
                </div>
            </div>
            <div class="center"><img src="images/hm.png" style="width:120px"></div>  
                <div class="row">
                    <?php
                        $getHM = $pd->getlatestfromHM();
                        if ($getHM) {
                            while ($result = $getHM->fetch_assoc()) {
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
                    <?php } }?>
                </div>
            </div>
    </div>
</body>

<style>
.center {
    display: flex;
    justify-content: center;
    background-color: black;
    height: 40px;
    margin:20px
}

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


html,
body {
	overflow-x: hidden; /* Hide horizontal scrollbar */
}
</style>
    
</html>
<?php include 'inc/footer.php' ?>
