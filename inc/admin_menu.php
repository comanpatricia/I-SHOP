<?php
    $login = Session::get("customerlogin");
    if($login==FALSE){
        echo "<script>window.location = 'login.php';</script>";
    }
?>
<html>
<body>
	<div class="bar">
		<div class="ul">
			<a href="admin_category.php" class="li"><span>Category</span></a>
			<a href="admin_brands.php" class="li"><span>Brand</span></a>
			<a href="admin_products.php" class="li"><span>Products</span></a>
			<a href="admin_customers.php" class="li"><span>Customers</span></a>
		</div>
	</div><br><br>
</body>
</html>

<style>
.main
}
.bar{
    width:180px;
}

.bar .ul {
	padding: 0;
    margin-left:30%;
}

.bar .ul .li {
	font-size: 21px;
	font-family: sans-serif;
	background-color: white;
	border: 2px solid black;
	letter-spacing: 0.18em;
	width: 140px;
	height: 35px;
	line-height: 1.5em;
	position: relative;
	overflow: hidden;
	margin: 10px;
	cursor: pointer;
    float:left;
	text-decoration: none;
}

.bar .ul .li span {
	color: white;
	mix-blend-mode: difference;
}

.bar .ul .li:before {
	content: '';
	position: absolute;
	width: 1.6em;
	height: inherit;
	background-color: black;
	border-radius: 50%;
	top: 0;
	left: -0.75em;
	transition: 0.5s ease-out;
}

.bar .ul .li:hover::before {
	transform: scale(9);
}

</style>
