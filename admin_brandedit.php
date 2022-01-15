<?php include 'inc/header.php';?>
<?php include 'inc/admin_menu.php';?>
<?php include_once 'classes/Brand.php';?>
<?php
    if(!isset($_GET['brandId']) || $_GET['brandId']== NULL ){
        echo "<script>window.location = 'brandlist.php';</script>";
    }else{
        $id = preg_replace('/[^-a-z-A-Z-0-9_]/', '',$_GET['brandId']);
    }

    $brand = new Brand();       //create obj
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $brandName = $_POST['brandName'];
    
    $updateBrand = $brand->brandUpdate($brandName,$id);         //Category class
    }
?>
<html>
<head>
    <link rel="stylesheet" href="admin_style.css">
    <title>Edit brand</title>
</head>
<body>
    <center>
                <h2>Update Brand</h2>
                
               <div class="block copyblock">
                   <?php
                        if(isset($updateBrand)){
                            echo $updateBrand;
                        }
                   ?>
                   <?php
                   $getBrand = $brand->getBrandById($id);
                   if($getBrand){
                      while($result = $getBrand->fetch_assoc()){    
                   ?>
                                                                   
                   <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" class="insert" value="<?php echo $result['brandName'] ;?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" class="button" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                   <?php }} ?>
                </div>
    </center><br><br><br>
</body>
</html>
<?php include 'inc/footer.php' ?>
