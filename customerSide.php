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


			<div class="row" id="grid"></div>
			<table class="table table-hover">
				<!-- headers for table -->

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
	
	
while($row = nextTuple($result)) {
					
					echo "\n <tr><td><div class='col-sm-12'>";
					//echo "<td>" . $row['category'] . "</td>";
					echo "<div class='col-sm-1'></div><div class='col-sm-2'><img src=". $row['image'] ."alt='' border='2' height='180' width='180' /></div>";
					echo "<div class='col-sm-2'><div>" . $row['product'] . "</div>";
					echo "<div> $" . $row['price'] . "</div><div>" . $row['image'] . "</div></div>";
					echo "<div class='form-group row'>
								<div class='col-sm-2'>
								<label for='sel1' class='control-label'>Quantity:</label>
								</div>
								<div class='col-sm-2'>
								<select class='form-control id='sel1'>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
								</select>
								<a style='margin-top:2em' href='updateInventory.php?id=" . $row['id']  .  "'>Add to cart</a>
								</div>
								</div>";
					// link to update record (item)
			        //echo "<div class='col-sm-2'><a href='updateInventory.php?id=" . $row['id']  .  "'>Add to cart</a></div>";
					// link to delete record (item)
					echo "</div></td></tr> \n";
					
				}

	}
	
	else{
// set up a query to get info on the cars form the db
	$query = "SELECT inventory.id, inventory.category, inventory.product, inventory.unit, inventory.price, inventory.stock FROM inventory;";
	
	//run the query
	$result = queryDB($query, $db);
	
	
while($row = nextTuple($result)) {
					
					echo "\n <tr><td><div class='col-sm-12'>";
					//echo "<td>" . $row['category'] . "</td>";
					echo "<div class='col-sm-1'></div><div class='col-sm-2'><img src=". $row['image'] ."alt='' border='2' height='180' width='180' /></div>";
					echo "<div class='col-sm-2'><div>" . $row['product'] . "</div>";
					echo "<div> $" . $row['price'] . "</div><div>" . $row['image'] . "</div></div>";
					echo "<div class='form-group row'>
								<div class='col-sm-2'>
								<label for='sel1' class='control-label'>Quantity:</label>
								</div>
								<div class='col-sm-2'>
								<select class='form-control id='sel1'>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
								</select>
								<a style='margin-top:2em' href='updateInventory.php?id=" . $row['id']  .  "'>Add to cart</a>
								</div>
								</div>";
					// link to update record (item)
			        //echo "<div class='col-sm-2'><a href='updateInventory.php?id=" . $row['id']  .  "'>Add to cart</a></div>";
					// link to delete record (item)
					echo "</div></td></tr> \n";
					
				}

	}
	
?>
</table>
<?php if (!empty($term)) echo "<a href='customerSide.php' class='btn btn-default glyphicon glyphicon-menu-left'>Back</a>";?>
<!-- Products List End -->
</body>
</html>