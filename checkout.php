<html>
	<head>
<!-- Bootstrap link -->		
		
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		
		<title>Grocery Hawk</title>
	</head>
	<body>

<!-- Menu bar -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav navbar-left">
        <li><a href="customerSide.php"><span class="glyphicon glyphicon-grain"></span> Continue Shopping</a></li>
     </ul>
     <ul class="nav navbar-nav navbar-right">
		<li class="active"><a href="checkout.php"><span class="glyphicon glyphicon-check"></span> Checkout</a></li>
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

<?php
session_start();
include_once("config.php");
include_once('dbutils.php');
if (isset($_POST['submit'])) {
	//if we are here, form was sumbitted and needs to process form data
	
	//get data from form
	$id = $_POST['id'];
	$customerName = $_POST['customerName'];
	$homeAddress = $_POST['homeAddress'];
	$billingAddress = $_POST['billingAddress'];
	$creditCard = $_POST['creditCard'];
	$cardExp = $_POST['cardExp'];
	$cardCode = $_POST['cardCode'];
	
	// variables to keep track if the form is complete (false if issues)
	$isComplete = true;
	
	// error message if issues with data
	$errorMessage = "";
	
	// stop execution and show error if the form is not complete
	if ($isComplete){

	
		// put together SQL statement to insert new record
		$query = "INSERT INTO customers(homeAddress, billingAddress, creditCard, cardExp, cardCode) VALUES ('$homeAddress', '$billingAddress', '$creditCard', $cardExp, $cardCode);";
		
		// connect to db
		$db = connectDB($DBHost, $DBUser, $DBPasswd, $DBName);
		
		// run the insert statement
		$result = queryDB($query, $db);
		
		// we have successfully entered the data
		echo ("Successfully completed order!");
	}
}


?>

<!-- Form to enter items -->
<div class="row">
	<div class="col-xs-12" style="margin-left: 10px;">
		
<form action="grocer_input.php" method="post">


<!-- Name -->
<div class="form-group">
	<label for="customerName">Name: </label>
	<input type="text" class="form-control" name="customerName" value="<?php if($customerName) { echo $customerName;} ?>" />
</div>

<!-- Home Address -->
<div class="form-group">
	<label for="product">Home Address: </label>
	<input type="text" class="form-control" name="homeAddress" value="<?php if($homeAddress) { echo $homeAddress;} ?>" />
</div>

<!-- Billing Address -->
<div class="form-group">
	<label for="unit">Billing Address: </label>
	<input type="text" class="form-control" name="billingAddress" value="<?php if($billingAddress) { echo $billingAddress;} ?>" />
</div>

<!-- Credit Card Number -->
<div class="form-group">
	<label for="creditCard">Credit Card Number: </label>
	<input type="number" min="12" class="form-control" name="creditCard" value="<?php if($creditCard) { echo $creditCard;} ?>" />
</div>

<!-- Card Expiration -->
<div class="form-group">
	<label for="cardExp">Card Expiration Date: </label>
	<input type="text" class="form-control" name="unit" value="<?php if($cardExp) { echo $cardExp;} ?>" />
</div>

<!-- Card Security Code -->
<div class="form-group">
	<label for="cardCode">Card Security Code: </label>
	<input type="number" min="3" class="form-control" name="cardCode" value="<?php if($cardCode) { echo $cardCode;} ?>" />
</div>
	
<button type="submit" class="btn btn-default" name="submit"><span class="glyphicon glyphicon-usd"></span> Finish Purchase</button>
	

</form>
		
	</div>
</div>

<h1 align="center">View Cart</h1>
<div class="cart-view-table-back">
<form method="post" action="updateCart.php">
<table width="100%"  cellpadding="6" cellspacing="0"><thead><tr><th>Quantity</th><th>Name</th><th>Price</th><th>Total</th><th>Remove</th></tr></thead>
  <tbody>
 	<?php
	if(isset($_SESSION["cart_products"])) //check session var
    {
		$total = 0; //set initial total value
		$b = 0; //var for zebra stripe table 
		foreach ($_SESSION["cart_products"] as $cart_itm)
        {
			//set variables to use in content below
			$product = $cart_itm["product"];
			$unit = $cart_itm["unit"];
			$price = $cart_itm["price"];
			$code = $cart_itm["code"];
			$subtotal = ($price * $unit); //calculate Price x Unit
			
		   	$bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 
		    echo '<tr class="'.$bg_color.'">';
			echo '<td><input type="text" size="2" maxlength="2" name="unit['.$code.']" value="'.$unit.'" /></td>';
			echo '<td>'.$product.'</td>';
			echo '<td>'.$currency.$price.'</td>';
			echo '<td>'.$currency.$subtotal.'</td>';
			echo '<td><input type="checkbox" name="remove_code[]" value="'.$code.'" /></td>';
            echo '</tr>';
			$total = ($total + $subtotal); //add subtotal to total var
        }
		
		$grand_total = $total + $shipping_cost; //grand total including shipping cost
		foreach($taxes as $key => $value){ //list and calculate all taxes in array
				$tax_amount     = round($total * ($value / 100));
				$tax_item[$key] = $tax_amount;
				$grand_total    = $grand_total + $tax_amount;  //add tax val to grand total
		}
		
		$list_tax       = '';
		foreach($tax_item as $key => $value){ //List all taxes
			$list_tax .= $key. ' : '. $currency. sprintf("%01.2f", $value).'<br />';
		}
		$shipping_cost = ($shipping_cost)?'Shipping Cost : '.$currency. sprintf("%01.2f", $shipping_cost).'<br />':'';
	}
    ?>
  </tbody>
</table>
<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>
</div>


</body>
</html>