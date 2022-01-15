<?php
ob_start();
 
include 'lib/Session.php';
Session::init();
include 'lib/Database.php';
include 'helpers/Format.php';
spl_autoload_register(function($class) {
     include_once "classes/" . $class . ".php";   
});

$db  = new Database();
$fm  = new Format();
$ct  = new Cart();
$pd  = new Product();
$cat = new Category();
$cmr = new Customer();
?>

<head>
    <title>I-SHOP Invoice</title>
</head>
<body>
	<header style="font-size:20px">
		<h1>I-SHOP Invoice</h1>
		<address>
			<p>I-SHOP</p>
			<p>Str. Teodor Mihali, Cluj Napoca, <br>Romania</p>
			<p>+0040753479397</p>
		</address>
        <img src="images/shopp.png" style="width:250px; float:right">
	</header>
	<article style="font-size:18px">
		<address>
            <?php
                $id = Session::get("customerId");
                $getCustomerData = $cmr->customerData($id);
                if($getCustomerData){
                        while($result = $getCustomerData->fetch_assoc()){                    
            ?>
                
            <p><?php echo $result['c_name'];?></p>
            <p><?php echo $result['c_address'];?>, <?php echo $result['city_name'];?> , <?php echo $result['area_name'];?></p>
            <p><?php echo $result['c_zip'];?></p>			
            <p><?php echo $result['c_phone'];?></p>						
        </address>
        <?php } } ?>

        <?php
            $getPro = $ct->getCartProduct();
            if($getPro){                        // produs adaugat in cos in functie de ID-ul sesiunii user-ului
                $i   = 0;
                $sum = 0;
                $qty = 0;

                while($result = $getPro->fetch_assoc()){
                    $i++;                                    
        ?>
		<table class="inventory">
			<thead>
				<tr>
					<th><span >Item</span></th>
					<th><span >Description</span></th>
					<th><span >Price/article</span></th>
					<th><span >Quantity</span></th>
					<th><span >Price</span></th>
				</tr>
			</thead>
			<tbody>
				<tr>
                    <td><?php echo $i;?></td>
					<td><a></a><span ><?php echo $result['productName'];?></span></td>
					<td><span ><?php echo $result['price'].'€';?></span></td>
					<td><span ><?php echo $result['quantity'];?></span></td>
					<td>
                        <span>
                            <?php
                                $total = $result['price'] * $result['quantity'];
                                echo $total.'€';
                            ?>
                        </span>
                    </td>
				</tr>
                <?php
                        $qty = $qty + $result['quantity'];
                        $sum = $sum + $total;
                        ?>
                <?php } }?> 
			</tbody>
		</table>

		<table class="balance">
			<tr>
				<th><span >Sub Total</span></th>
				<td><span><?php echo $sum.'€';?></span></td>
			</tr>
			<tr>
				<th><span >VTA (10%)</span></th>
				<td>
                    <span>
                        <?php
                            $vat = $sum * 0.1;
                            echo $vat;
                        ?>
                    </span>
                </td>
			</tr>
			<tr>
				<th><span >Grand Total</span></th>
				<td>
                    <span>
                        <?php                                
                            $total_sum = $sum + $vat;                                
                            echo '$'.$total_sum;
                        ?>
                    </span>
                </td>
			</tr>
		</table>
	</article>
	<aside>
		<h1><span>Thank you for your order!</span></h1>
	</aside>
    <div>
        <button type="button" style="float:right" onClick="window.close()">
            <i class="fa fa-close"> <b>Close</b></i>
        </button>
        <button type="button" class="btn btn-sm btn float-right" onClick="window.print()">
            <i class="fa fa-print"> <b>Print</b></i>
        </button>
    </div>
</body>

<style>

/* heading */

h1 { 
    font: bold 100% sans-serif; 
    letter-spacing: 0.5em; 
    text-align: center; 
    text-transform: uppercase; 
}

/* table */

th, td { 
    border-width: 1px; 
    padding: 0.5em; 
    position: relative; 
    text-align: left; 
    border:1px solid black 
}
th { 
    background: #EEE; 
    border-color: #BBB; 
}
td { 
    border-color: #DDD; 
}

/* page */

html { 
    font: 16px/1 'Open Sans', sans-serif; 
    overflow: auto; 
    padding: 0.5in; 
}
html { 
    background: #999; 
    cursor: default; 
}

body { 
    box-sizing: border-box; 
    height: 11in; 
    margin: 0 auto; 
    overflow: hidden; 
    padding: 0.5in; 
    width: 8.5in; 
}
body { 
    background: #FFF; 
    border-radius: 1px; 
    box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); 
}

/* header */

header { 
    margin: 0 0 3em; 
}
header:after { 
    clear: both; 
    content: ""; 
    display: table; 
}

header h1 { 
    background: #000;
    border-radius: 0.25em;
    color: #FFF;
    margin: 0 0 1em;
    padding: 0.5em 0;
}
header address { 
    float: left;
    font-size: 75%;
    font-style: normal;
    line-height: 1.25;
    margin: 0 1em 1em 0;
}
header address p { 
    margin: 0 0 0.25em;
}
header input { 
    cursor: pointer;
    -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    height: 100%;
    left: 0;
    opacity: 0;
    position: absolute;
    top: 0;
    width: 100%;
}

/* article */

article, article address, table.meta, table.inventory { 
    margin: 0 0 3em;
}
article:after { 
    clear: both;
    content: "";
    display: table;
}
article h1 { 
    clip: rect(0 0 0 0);
    position: absolute;
}

article address { 
    float: left;
    font-weight: bold;
}

/* table meta & balance */

table.meta, table.balance { 
    float: right;
    width: 36%;
}
table.meta:after, table.balance:after { 
    clear: both;
    content: "";
    display: table;
}

/* table items */

table.inventory { 
    clear: both;
    width: 100%;
}
table.inventory th { 
    font-weight: bold;
    text-align: center;
}


/* table balance */

table.balance th, table.balance td { 
    width: 50%;
}
table.balance td { 
    text-align: right;
}

/* aside */

aside h1 { 
    border: none;
    border-width: 0 0 1px; 
    margin: 0 0 1em; 
}
aside h1 { 
    border-color: #999; 
    border-bottom-style: solid; 
}

@page { 
    margin: 0; 
}
</style>
</html>

