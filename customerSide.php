<?php
include_once('header.php');
?>

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
		$bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
		echo '<tr class="'.$bg_color.'">';
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
	$query = "SELECT inventory.id, inventory.category, inventory.product, inventory.unit, inventory.price, inventory.stock FROM inventory WHERE inventory.product LIKE '%".$term."%' or inventory.category LIKE '%".$term."%'";
	
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