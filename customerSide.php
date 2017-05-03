<html>
	<head>
<!-- Bootstrap link -->		
		
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>Grocery Hawk</title>
	</head>
	<body>
		
		
<?php
// check if the form data needs to be  processed
// include config and utils files
include_once('config.php');
include_once('dbutils.php');
?>

<div class="row">
	<div class="col-xs-12">
		<h1>Welcome to Grocery Hawk</h1>
	</div>
</div>

<!-- Menu bar -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav navbar-left">
        <li class="active"><a href="customerSide.php"><span class="glyphicon glyphicon-grain"></span> Inventory</a></li>
        <li><a href="customerOrders.php"><span class="glyphicon glyphicon-tags"></span>  Orders</a></li>
     </ul>
     <ul class="nav navbar-nav navbar-right">
		<li>
		<form class="navbar-form navbar-left" role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search" name="term" id=“term”>
				</div>
			<button type="submit" class="btn btn-default">Go!</button>
			</form>
		</li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php
			session_start();
			if(isset($_SESSION['email'])){
				echo $_SESSION['email'];
			}else{
				if (!isset($_SESSION['email'])) {
					session_destroy();
				}
				echo "Guest ";
			}
			?><span class="caret"></span></a>
			<ul class="dropdown-menu">
			<?php if(isset($_SESSION['email'])){ echo"
			<li><a href='#'>Account Information</a></li>
            <li><a href='#'>Order History</a></li>
            <li><a href='#'>Order Status</a></li>
            <li><a href='#'>Help</a></li>
            <!--li role='separator' class='divider'></li-->";}
             else{
				echo "<li><a href='customerLogin.php'>Please Login</a></li>";
			}?>
			</ul>
			</li>		
		<li><a href="viewCart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</a></li>
		<li><?php 
		session_start();
		if(isset($_SESSION['email'])){

			echo "<a href='customerLogout.php'><span class='glyphicon glyphicon-log-out'></span> Log Out</a>";
		}else{
			if (!isset($_SESSION['email'])) {
			session_destroy();
		} 
			echo "<br/><li><a href='customerLogin.php'>Login/Create Account</a></li>";
		}
		?></li>
        <!--<li><a href="customerLogin.php">Login/Create Account</a></li>-->
     </ul>
  </div>
</nav>

<style type="text/css">
        body {
            border-top: 5px solid #ffcc00;
            background-image: -ms-linear-gradient(top, #ffeeaa 0%, #EEEEEE 100%);
            background-image: -moz-linear-gradient(top, #ffeeaa 0%, #EEEEEE 100%);
            background-image: -o-linear-gradient(top, #ffeeaa 0%, #EEEEEE 100%);
            background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #ffeeaa), color-stop(1, #EEEEEE));
            background-image: -webkit-linear-gradient(top, #ffeeaa 0%, #EEEEEE 100%);
            background-image: linear-gradient(to bottom, #ffeeaa 0%, #EEEEEE 100%);
        }
</style>


<h1 align="center">Products</h1>
<!-- View Cart Box Start -->
<?php
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
{
	echo '<div class="cart-view-table-front" id="view-cart">';
	echo '<h3>Your Shopping Cart</h3>';
	echo '<form method="post" action="updateCart.php">';
	echo '<table width="100%"  cellpadding="6" cellspacing="0">';
	echo '<tbody>';

	$total =0;
	$b = 0;
	foreach ($_SESSION["cart_products"] as $cart_itm)
	{
		$product = $cart_itm["product"];
		$unit = $cart_itm["unit"];
		$price = $cart_itm["price"];
		$code = $cart_itm["code"];
		echo '<td>Qty <input type="text" size="2" maxlength="2" name="unit['.$code.']" value="'.$unit.'" /></td>';
		echo '<td>'.$product.'</td>';
		echo '<td><input type="checkbox" name="remove_code[]" value="'.$code.'" /> Remove</td>';
		echo '</tr>';
		$subtotal = ($price * $unit);
		$total = ($total + $subtotal);
	}
	echo '<td colspan="4">';
	echo '<button type="submit">Update</button><a href="viewCart.php" class="button">Checkout</a>';
	echo '</td>';
	echo '</tbody>';
	echo '</table>';
	
	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
	echo '</form>';
	echo '</div>';

}
?>
<!-- View Cart Box End -->


<!-- Products List Start -->
<?php
	/*
	 *List all products in the database
	 *
	 */
	
	
	//conect to the database
	$db = connectDB($DBHost, $DBUser, $DBPasswd, $DBName);
	$term = $_GET['term'];
	
	if (!empty($term)) {
		
	// set up a query to get info on the cars form the db
	$query = "SELECT inventory.id, inventory.category, inventory.product, inventory.unit, inventory.price, inventory.stock FROM inventory WHERE inventory.product LIKE '%".$term."%'";
	
	//run the query
	$result = queryDB($query, $db);
	
	
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

if($result){ 
$products_item = '<ul class="products">';
//fetch results set as object and output HTML
while($obj = $result->fetch_object())
{
	//var_dump($obj);
$products_item .= <<<EOT
	<li class="product">
	<form method="post" action="updateCart.php">
	<div class="product-content"><h3>{$obj->product}</h3>
	<div class="product-desc">{$obj->product_desc}</div>
	<div class="product-info">
	Price {$currency}{$obj->price} 
	
	<fieldset>
	<label>
		<span>Quantity</span>
		<input type="text" size="2" maxlength="2" name="unit" value="1" />
	</label>
	
	</fieldset>
	<input type="hidden" name="id" value="{$obj->id}" />
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="{$current_url}" />
	<div align="center"><button type="submit" class="add_to_cart">Add</button></div>
	</div></div>
	</form>
	</li>
EOT;
}
$products_item .= '</ul>';
echo $products_item;
}

	}
	
	else{
// set up a query to get info on the cars form the db
	$query = "SELECT inventory.id, inventory.category, inventory.product, inventory.unit, inventory.price, inventory.stock FROM inventory;";
	
	//run the query
	$result = queryDB($query, $db);
	
	
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

if($result){ 
$products_item = '<ul class="products">';
//fetch results set as object and output HTML
while($obj = $result->fetch_object())
{
	//var_dump($obj);
$products_item .= <<<EOT
	<li class="product">
	<form method="post" action="updateCart.php">
	<div class="product-content"><h3>{$obj->product}</h3>
	<div class="product-desc">{$obj->product_desc}</div>
	<div class="product-info">
	Price {$currency}{$obj->price} 
	
	<fieldset>
	
	<label>
		<span>Quantity</span>
		<input type="text" size="2" maxlength="2" name="unit" value="1" />
	</label>
	
	</fieldset>
	<input type="hidden" name="id" value="{$obj->id}" />
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="{$current_url}" />
	<div align="center"><button type="submit" class="add_to_cart">Add</button></div>
	</div></div>
	</form>
	</li>
EOT;
}
$products_item .= '</ul>';
echo $products_item;
}

	}
	
?>
<?php if (!empty($term)) echo "<a href='customerSide.php' class='btn btn-default glyphicon glyphicon-menu-left'>Back</a>";?>
<!-- Products List End -->
</body>
</html>