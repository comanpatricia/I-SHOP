<?php include 'inc/header.php';?>
<?php include 'inc/admin_menu.php';?>
<?php include_once 'classes/Product.php';?>
<?php include_once 'helpers/Format.php';?>
    
<?php
    $pd = new Product();
    $fm = new Format();
?>
<?php
    if(isset($_GET['delpro'])){
        
        $id = preg_replace('/[^-a-z-A-Z-0-9_]/', '',$_GET['delpro']); /// validation using regex
        $delPro = $pd->delProById($id);  /// belong to the product class
    }
?>

<html>
<head>
    <link rel="stylesheet" href="admin_style.css">
    <title>Product list</title>
</head>
<body>
    <center>
        <h2>Products List</h2>
        <div class="block">  
            <?php
                if(isset($delPro)){
                    echo $delPro;
                }
            ?>
            <table>
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $getPd = $pd->getAllProduct();
                            if($getPd){
                                $i = 0;
                                while ($result = $getPd->fetch_assoc()){
                                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['productName'];?></td>
                        <td><?php echo $result['catName'];?></td>
                        <td class="center"><?php echo $result['brandName'];?></td>
                        <td><?php echo $fm->textShorten($result['body'], 50);?></td>
                        <td><?php echo '$'.$result['price'];?></td>
                        <td><img src="<?php echo $result['image']; ?>" width="60px" height="40px"/></td>
                        <td class="center">
                            <?php
                                if($result['type']==0){
                                    echo 'Featured';
                                } else{
                                    echo 'General';
                                }
                            ?></td>
                        <td><a class="button" href="admin_productedit.php?proId=<?php echo $result['productId'];?>">Edit</a> 
                            or <a class="button" onclick="return confirm('Are you sure want to delete!')" href="?delpro=<?php echo $result['productId'];?>">Delete</a></td>
                    </tr>
                    <?php }} ?>
                </tbody>
            </table>        
        </div>
    </center><br><br><br>
</body>
<style>
    table, td, th {
    border: 1px solid rgb(136, 136, 136);
  }
  
  table {
    width: auto;
    border-collapse: collapse;
  }
</style>
</html>
<?php include 'inc/footer.php' ?>




