<?php include 'inc/header.php';?>
<?php include 'inc/admin_menu.php';?>
<?php include_once 'classes/Product.php';?>
<?php include_once 'classes/Category.php';?>
<?php include_once 'classes/Brand.php';?>
<?php
    if(!isset($_GET['proId']) || $_GET['proId']== NULL ){
        echo "<script>window.location = 'productlist.php';</script>";
    }else{
        $id = preg_replace('/[^-a-z-A-Z-0-9_]/', '',$_GET['proId']);
    }
    $pd = new Product();        // create obj
    if(isset($_POST['submit'])){
    
    $updateProduct = $pd->productupdate($_POST,$_FILES,$id);        //Product class
    }
?>
<html>
<head>
    <link rel="stylesheet" href="admin_style.css">
    <title>Product edit</title>
</head>
<body>
    <center>
        <h2>Update Product</h2>
        <div class="block"> 
            <?php
                if(isset($updateProduct)){
                    echo $updateProduct;
                }
            ?>
            <?php
                $getProduct = $pd->getProductById($id);
                if($getProduct){
                while($value= $getProduct->fetch_assoc())
            {?>
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" name="productName" class="insert" value="<?php echo $value['productName'] ?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" name="catId">
                                <option>Select Category</option>
                                <?php 
                                    $cat = new Category();
                                    $getCat = $cat->getAllCat();
                                    if($getCat){
                                        while ($result = $getCat->fetch_assoc()){
                                ?>
                                <option 
                                    <?php
                                        if($value['catId'] == $result['catId'])
                                    {?>
                                        selected="selected"
                                    <?php }?>
                                        value="<?php echo $result['catId'] ?>"><?php echo $result['catName']; ?></option>
                                <?php }}?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Brand</label>
                        </td>
                        <td>
                            <select id="select" name="brandId">
                                <option>Select Brand</option>
                                <?php 
                                    $brand = new Brand();
                                    $getBrand = $brand->getAllBrand();
                                    if($getBrand){
                                        while ($result = $getBrand->fetch_assoc()){
                                ?>
                                <option 
                                    <?php
                                        if($value['brandId'] == $result['brandId']){?>
                                            selected="selected"
                                    <?php }?>
                                            value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName']; ?></option>
                                <?php }}?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Description</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="body"><?php echo $value['body'] ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Price</label>
                        </td>
                        <td>
                            <input type="text" name="price" class="insert" value="<?php echo $value['price'] ?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <img src="<?php echo $value['image']; ?>" width="150px" height="180px"/>
                            <br>
                            <input type="file" name="image" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Product Keywords</label>
                        </td>
                        <td>
                            <input type="text" name="keywords" class="insert" value="<?php echo $value['keywords'] ?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Product Type</label>
                        </td>
                        <td>
                            <select id="select" name="type">
                                <option>Select Type</option>
                                    <?php 
                                        if($value['type']==0){
                                    ?>
                                        <option value="0" selected="selected">Unique</option>
                                        <option value="1">General</option>
                                    <?php }else{?>
                                <option value="1" selected="selected">General</option>
                                <option value="0">Unique</option> 
                                <?php }?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" class="button" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
            <?php }}?>
        </div>
    </center><br><br><br>
</body>
</html>
<?php include 'inc/footer.php' ?>




