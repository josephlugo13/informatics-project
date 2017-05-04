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
        <li class="active"><a href="customerSide.php">Inventory</a></li>
        <li><a href="customerOrders.php">Orders</a></li>
     </ul>
     <ul class="nav navbar-nav navbar-right">
		<li>
		<form class="navbar-form" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
		</li>
		<li><a href="shopCart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</a></li>
		<li><?php 
		session_start();
		if(isset($_SESSION['email'])){
			echo "<br/><li><a href='customerLogout.php'>Logout</a></li>";
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

<!-- Title -->	
<div class="row">
	<div class="col-xs-12">
		   <h2>Inventory</h2>
	</div>
</div>


<!-- welcome user -->
<div class="row">
    <div class="col-xs-10">
        <p><?php if(isset($_SESSION['email'])) echo 'Welcome:' . '&nbsp' . $_SESSION['email']; ?></p>
    </div>
</div>


<!-- show contents of items table -->
<div class="row">
	<div class="col-xs-12">
		
<!-- Set up html table to show contents -->
<table class="table table-hover">
	<!-- headers for table -->
	<thead>
		<th>Category</th>
		<th>Product</th>
		<th>Unit</th>
		<th>Price</th>
		<th>Stock</th>
		<th> </th>
		<th> </th>
		<th> </th>
	</thead>
	
<?php
	/*
	 *List all products in the database
	 *
	 */
	
	
	//conect to the database
	$db = connectDB($DBHost,$DBUser, $DBPasswd, $DBName);
	
	// set up a query to get info on the cars form the db
	$query = "SELECT inventory.category, inventory.product, inventory.unit, inventory.price, inventory.stock, inventory.id FROM inventory;";
	
	//run the query
	$result = queryDB($query, $db);
	
	
	
	
	while($row = nextTuple($result)) {
		
		echo "\n <tr>";
		echo "<td>" . $row['category'] . "</td>";
		echo "<td>" . $row['product'] . "</td>";
		echo "<td>" . $row['unit'] . "</td>";
		echo "<td>" . $row['price'] . "</td>";
		echo "<td>" . $row['stock'] . "</td>";
		echo "<td><a href='shopCart.php?id=" . $row['id']  .  "'>Add to Cart</a></td>";
		echo "</tr> \n";
	}
	
	
?>
	</table>
		
	</div>
</div>

	</body>
</html>
