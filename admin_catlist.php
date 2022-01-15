<?php include 'inc/header.php';?>
<?php include 'inc/admin_menu.php';?>
<?php include_once 'classes/Category.php';?>
<?php
    $cat = new Category(); /// obj create
    if(isset($_GET['delcat'])){
        
        $id = preg_replace('/[^-a-z-A-Z-0-9_]/', '',$_GET['delcat']); /// validation using regex
        $delCat = $cat->delCatById($id);  /// belong to the category class
    }
?>
<html>
<head>
    <link rel="stylesheet" href="admin_style.css">
    <title>Category list</title>
</header>
<body>
    <center>
        <h2>Category List</h2>
        <div class="block"> 
            <?php
                if(isset($delCat)){
                    echo $delCat;
                }
            ?>
            <table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Category Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
                <?php
                    $getCat = $cat->getAllCat();
                    if($getCat){
                    $i= 0;
                    while($result = $getCat->fetch_assoc()){
                        $i++;
                ?>
				    <tr>
						<td><?php echo $i;?></td>
                        <td><?php echo $result['catName'] ;?></td>
                        <td><a class="button" href="admin_catedit.php?catId=<?php echo $result['catId'];?>">Edit</a> 
                                or <a class="button" onclick="return confirm('Are you sure want to delete!')"href="?delcat=<?php echo $result['catId'];?>">Delete</a>
                        </td>
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
<?php include 'inc/footer.php';?>
