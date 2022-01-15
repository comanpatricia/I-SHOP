<?php include 'inc/header.php' ?>
<?php
if (isset($_GET['proId'])) {
    $id = preg_replace('/[^-a-z-A-Z-0-9_]/', '', $_GET['proId']);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'&& isset($_POST['submit'])){
    $quantity = $_POST['quantity'];
    $addCart = $ct->addToCart($quantity, $id);    
}
?>
<?php
    $cmrId =  Session::get("customerId"); 
?>
<?php
    $cmrId =  Session::get("customerId"); 
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['wlist'])){
    $productId = $_POST['productId'];
    $saveWlist = $pd->saveWishList($cmrId,$productId); /// belong to the product class
    }
?>

<html>
<head>
    <title>Product page</title>
</head>
<body>
	<div class="backdrop"></div>
		<div class="main">
			<div class="content">
				<?php
					$getpd = $pd->getSingleProduct($id); /// product details
					if ($getpd) {
						while ($result = $getpd->fetch_assoc()) {
				?>
				<center><br><br>
					<div class="title">
						<b><a class="text-center" style="font-size:30px;"><?php echo $result['productName']; ?></a></b>
						<p style="">Price: <span><?php echo $result['price']; ?>€</span></p>
					</div>
				</center>
				<section id="product" class="product">
					<div style="margin-left:38.5%">
						<form action="" method="post">
							<input type="hidden" class="button" name="quantity" value="1" min="1"/>
							<input type="submit" class="button" name="submit" value="Buy Now"/>
						</form>				
					</div>
                    
					<?php if (isset($addCart)){?>
						<span><?php echo $addCart; }?></span>
					<br>								
					<div class="row">
						<div class="product__photo">
							<div class="column">
								<img src="admin/<?php echo $result['image'] ?>" style="width: 400px;height: 560px"/>
							</div>
							<div class="column">
								<img src="images/<?php echo $result['gif'] ?>" style="width: 400px;height: 560px"/>
							</div>
							<div class="column">
								<img src="images/<?php echo $result['image2'] ?>" style="width: 400px;height: 560px"/>
							</div>
						</div>
					</div>
					<?php if (isset($saveWlist)){?>
						<span><?php echo $saveWlist; }?></span>
					<?php
						$login = Session::get("customerId");
						// daca utilizatorul e autentificat, va putea vede aceste functii in functie de sesiune
						if($login==TRUE){?>		
					<div class="">
						<div style="margin-left:38.5%; margin-top:20px">
							<form action="" method="post">
								<input type="hidden" class="button"  name="productId" value="<?php echo $result['productId'];?>">
								<input type="submit" class="button" name="wlist" value="Add to wishlist"/>
							</form>
						</div>
					</div>					
					<?php }?>
					<div class="product__info">
						<div class="price">
							<p>Category: <span><?php echo $result['catName']; ?></span></p>
							<p>Brand: <span><?php echo $result['brandName']; ?></span></p>
						</div>
					</div>
					<div class="variant">
						<h3>COLOR</h3>
						<span><?php echo $result['color']; ?></span><br><br>
						<h3>SIZE</h3>
						<span><?php echo $result['size']; ?></span>

						</div>
						<div class="description">
							<h3>DESCRIPTION</h3>
							<?php echo nl2br( $result['body'] ); ?> <!--Inserts HTML line breaks before all newlines in a string --> 
						</div>
						<div class="open" style="cursor:pointer; font-size:20px; margin-left:50px">Click here to see the <b>measures table.</b></div>
					</div>
					<?php }} ?>
					<div class="modal">
						<div class="measures">
							<center>
								<div class="column-table">
									<table class="table">
										<thead>
											<tr>
												<th class="col">
													<p class="p">Size</p>
												</th>
												<th class="col">
													<p>Chest circumference</p>
														</th>
												<th class="col">
													<p>Waist circumference</p>
												</th>
												<th class="col">
													<p>Hips circumference</p>
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>32/XXS</td>
												<td>74-77</td>
												<td>61-63</td>
												<td>83-85</td>
											</tr>
											<tr>
												<td>34/XS</td>
												<td>78-81</td>
												<td>62-64</td>
												<td>86-89</td>
											</tr>
											<tr>
												<td>36/S</td>
												<td>82-85</td>
												<td>65-67</td>
												<td>93-96</td>
											</tr>
											<tr>
												<td>38/M</td>
												<td>86-89</td>
												<td>68-71</td>
												<td>97-100</td>
											</tr>
											<tr>
												<td>40/XL</td>
												<td>90-93</td>
												<td>72-75</td>
												<td>101-104</td>
											</tr>
											<tr>
												<td>42/XXL</td>
												<td>94-97</td>
												<td>76-79</td>
												<td>105-107</td>
											</tr>
											<tr>
												<td>44/XXL</td>
												<td>98-101</td>
												<td>80-84</td>
												<td>108-112</td>
											</tr>
											<tr>
												<td>46/XXXL</td>
												<td>102-106</td>
												<td>85-89</td>
												<td>113-117</td>
											</tr>
										</tbody>
									</table>
									<a href="table.php" class="button" style="width:270px; float:center;">Click here for more details</a>
								</div>
							</center>
							<br>
     					    <br>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</body>

<style> 

/* ----- Global ----- */
*{
	box-sizing: border-box	
}

html,
body {
	overflow-x: hidden; /* Hide horizontal scrollbar */
}

body {
	font-family: "Raleway", sans-serif;
	background-color: white;
	
}

h3 {
	font-size:  18px;
	letter-spacing: 1.2px;
	color: orange;
}

img {
    margin-left: auto;
    margin-right: auto;	
    max-width: 100%;
}

/* ----- Product Section ----- */
.product {
	padding: 10px 0;
	width: auto;
	background-color: white;
	margin-left:70px
}

.column {
  float: left;
  width: 33.33%;
  padding: 15px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
}

/* ----- Photo Section ----- */
.product__photo {
	position: relative;
	margin-left:50px;
}

/* ----- Informations Section ----- */
.product__info {
	padding: 20px;
	margin-left:50px;

}

.title {
	h1 {
		margin-bottom: 0.1em;
		color: $color-primary;
		font-size: 1.5em;
		font-weight: 900;
	}

	span {
		font-size: 0.7em;
		color: $color-secondary;
	}
}

.price {
	margin: 1.5em 0;
	font-size: 20px;

	span {
		padding-left: 0.15em;
		font-size:30px;
	}
}

.variant {
	overflow: auto;
	margin-left:50px;
}

.variant li {
		float: left;
        width: 35px;
		height: 35px;
		border: 1px solid black;
		border-radius: 3px;
		cursor: pointer;
        list-style-type:none;
        margin: 2px;
}

.description {
	margin: 2em 0;
	margin-left:50px;

	h3 {
		margin-bottom: 1em;
	}

	ul {
		font-size: 0.8em;
		list-style: disc;
		margin-left: 1em;
	}

	li {
		text-indent: -0.6em;
		margin-bottom: 0.5em;
	}
}

.button {
	background-color: black;  
	border: none;
	color: white;
	padding: 10px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	transition-duration: 0.4s;
	cursor: pointer;
	border-radius: 8px;
	width: 170px;
	margin-left:50px;
	}

	.button:hover {
	background-color: orange;
	color: black;
	text-decoration: none;
	font-weight:bold;
}




/*modal*/
.backdrop {
    display: none;
    position: fixed;
    background: rgba(0, 0, 0, 0.5);
    top: 0;
    height: 100vh;
    width: 100vw;
}

.modal {
    display: none;
    background: white;
    padding: 10px;
    width: 100px;
	position: fixed;
	left: 48%;
	margin-top: 13%;
	width: 100%; /* Full width */
  	margin: auto;

}

.modal h1 {
    margin: 0;
}

.modal button {
    background: #fa923f;
    color: white;
    border: 1px solid #521751;
    font: inherit;
    font-size: 12px;
    cursor: pointer;
}

.modal button:hover,
.modal button:active {
    background: #521751;
}

.modal button:focus {
    outline: none;
}

@media (min-width: 400px) {
    .modal {
        width: 610px;
        height: 575px;
    }
}


/* Measures table*/

.column-table {
	float: left;
	width:40%;
}

.list{
    width: 60%;
    list-style-type:none;
}

p{
    font-size: 20px;
}

th{
    background-color: #e7d1b1;
}

td,th {
    font-size: 16;
    padding: 8px;
    text-align: center;
}

.table{
    height: 270px;
    width: 414px;
    }

.col{
    padding:10px;
}

.p{
    margin-left: 20px;
    margin-right: 20px;
    border: 50px;
}

tr:nth-child(even) {
    background-color: #f2e6d5;
}

</style>

<script>
var table = document.querySelector('.open');
var backdrop = document.querySelector('.backdrop');
var modal = document.querySelector('.modal');

function openModal() {
    backdrop.style.display = 'block';
    modal.style.display = 'block';
}

function closeModal () {
    backdrop.style.display = 'none';
    modal.style.display = 'none';
}

table.onclick = openModal;
backdrop.onclick = closeModal;

console.log(table);
</script>

<?php include 'inc/footer.php' ?>
