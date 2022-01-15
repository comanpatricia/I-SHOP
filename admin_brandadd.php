<?php include 'inc/header.php';?>
<?php include 'inc/admin_menu.php';?>
<?php include_once 'classes/Brand.php';?>

<?php
    $brand = new Brand();   //creare obj
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $brandName = $_POST['brandName'];
    
    $insertBrand = $brand->brandInsert($brandName);     //Brand class
    }
?>

<html>
<head>
    <link rel="stylesheet" href="admin_style.css">
    <title>Add brand</title>
</head>
<body>
    <center>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Brand</h2>
                <div class="block copyblock">
                   <?php
                        if(isset($insertBrand)){
                            echo $insertBrand;
                       }
                   ?>
                    <form action="" method="post">
                        <table class="form">					
                            <tr>
                                <td>
                                    <input type="text" name="brandName" class="insert" placeholder="Enter Brand Name..." class="medium" />
                                </td>
                            </tr>
                            <tr> 
                                <td>
                                    <input type="submit" name="submit" class="button" Value="Save" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </center><br><br><br>
</body>
</html>
<?php include 'inc/footer.php' ?>
