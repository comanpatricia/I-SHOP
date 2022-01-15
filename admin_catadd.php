<?php include 'inc/header.php';?>
<?php include 'inc/admin_menu.php';?>
<?php include_once 'classes/Category.php';?>
<?php
    $cat = new Category(); /// obj create
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $catName = $_POST['catName'];
    
    $insertCat = $cat->catInsert($catName); /// belong to the category class
    }
?>

<html>
<head>
    <link rel="stylesheet" href="admin_style.css">
    <title>Add category</title>
</head>
<body>
    <center>
        <h2>Add a new Category</h2>
        <div class="block copyblock">
            <?php
                if(isset($insertCat)){
                    echo $insertCat;
                }
            ?>
            <form action="admin_catadd.php" method="post">
                <table class="form">					
                    <tr>
                        <td>
                            <input type="text" class="insert" name="catName" placeholder="Enter Category Name..." class="medium" />
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
    </center><br><br><br>
</body>
</html>
<?php include 'inc/footer.php';?>
