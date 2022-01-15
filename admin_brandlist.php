<?php include 'inc/header.php';?>
<?php include 'inc/admin_menu.php';?>
<?php include_once 'classes/Brand.php';?>
<?php
    $brand = new Brand();       //create obj
    
    if(isset($_GET['delbrand'])){
        
        $id = preg_replace('/[^-a-z-A-Z-0-9_]/', '',$_GET['delbrand']);         //validare folosind regex
        $delBrand = $brand->delBrandById($id);          //Category class
    }
?>
<html>
<head>
    <link rel="stylesheet" href="admin_style.css">
    <title>Brand list</title>
</head>
<body>
    <center>
        <h2>Brand List</h2>
        <div class="block">
            <?php
                if(isset($delBrand)){
                    echo $delBrand;
                } 
            ?>
            <table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Brand Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
                    <?php
                        $getBrand = $brand->getAllBrand();
                        if($getBrand){
                        $i= 0;
                        while($result = $getBrand->fetch_assoc()){
                        $i++;
                    ?>
					<tr>
						<td><?php echo $i;?></td>
                        <td><?php echo $result['brandName'] ;?></td>
                        <td><a  class="button" href="admin_brandedit.php?brandId=<?php echo $result['brandId'];?>">Edit</a> 
                                or <a class="button" onclick="return confirm('Are you sure want to delete!')" href="?delbrand=<?php echo $result['brandId'];?>">Delete</a></td>
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
