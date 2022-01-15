<?php include 'inc/header.php';?>
<?php include 'inc/admin_menu.php';?>
<?php include_once 'classes/Product.php';?>
<?php include_once 'classes/Category.php';?>
<?php include_once 'classes/Brand.php';?>
<?php
    $pd = new Product(); /// obj create
    if(isset($_POST['submit'])){
    
    $insertProduct = $pd->productInsert($_POST,$_FILES); /// belong to the product class
    }
?>
<html>
<head>
    <link rel="stylesheet" href="admin_style.css">
    <title>Add product</title>
</head>
<body>
    <center>
        <h2>Add New Product</h2>
        <div class="block"> 
            <?php
                if(isset($insertProduct)){
                    echo $insertProduct;
                }
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label >Name</label>
                        </td>
                        <td>
                            <input type="text" name="productName" class="insert" placeholder="Enter Product Name..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label >Category</label>
                        </td>
                        <td>
                            <select id="select" name="catId">
                                <option  class="dropdown">Select Category</option>
                                    <?php 
                                        $cat = new Category();
                                        $getCat = $cat->getAllCat();
                                        if($getCat){
                                            while ($result = $getCat->fetch_assoc()){
                                    ?>
                                <option value="<?php echo $result['catId'] ?>"><?php echo $result['catName']; ?></option>
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
                                <option value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName']; ?></option>
                                    <?php }}?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Description</label>
                        </td>
                        <td>
                            <textarea name="body"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Price</label>
                        </td>
                        <td>
                            <input type="text" name="price" class="insert" placeholder="Enter Price..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <input type="file" name="image" />
                        </td>
                    </tr>

<!-- 
                    <tr>
                        <td>
                            <label>Upload Gif</label>
                        </td>
                        <td>
                            <input type="file" name="gif" />
                        </td>
                    </tr>


                    -->

                    <tr>
                        <td>
                            <label>Product Keywords</label>
                        </td>
                        <td>
                            <input type="text" name="keywords" class="insert" placeholder="Enter Keywords..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Product Type</label>
                        </td>
                        <td>
                            <select id="select" name="type">
                                <option>Select Type</option>
                                <option value="0">Offers</option>
                                <option value="1">Unique</option>
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
        </div>
    </center><br><br><br>
</body>
</html>
<?php include 'inc/footer.php' ?>

