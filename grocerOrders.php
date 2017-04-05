<html>
	<head>
<!-- Bootstrap link -->		
		
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		
		<title>Grocer</title>
	</head>
	<body>


<?php
// check if the form data needs to be  processed
// include config and utils files
include_once('config.php');
include_once('dbutils.php');

?>

<!-- Menu bar -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav navbar-left">
        <li><a href="grocer_input.php">Inventory</a></li>
        <li class="active"><a href="grocerOrders.php">Orders</a></li>
     </ul>
     <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">log out</a></li>
     </ul>
  </div>
</nav>

<!-- Title -->	
<div class="row">
	<div class="col-xs-12">
		   <h1>Orders</h1>
	</div>
</div>




<!-- show contents of cars table -->
<div class="row">
	<div class="col-xs-12">
		
<!-- Set up html table to show contents -->
<table class="table table-hover">
	<!-- headers for table -->
	<thead>
		<th>Order Number</th>
		<th>Customer Name</th>
		<th>Items Ordered</th>
		<th>Total Price</th>
		<th>Order Status</th>
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
	$query = "SELECT orders.orderNumber, orders.customerName, orders.itemsOrdered, orders.totalPrice, orders.orderStatus FROM orders;";
	
	//run the query
	$result = queryDB($query, $db);
	
	
	
	
	while($row = nextTuple($result)) {
		
		echo "\n <tr>";
		echo "<td>" . $row['orderNumber'] . "</td>";
		echo "<td>" . $row['customerName'] . "</td>";
		echo "<td>" . $row['itemsOrdered'] . "</td>";
		echo "<td>" . $row['totalPrice'] . "</td>";
		echo "<td>" . $row['orderStatus'] . "</td>";
		// link to update record (item)
        echo "<td><a href='updateOrder.php?id=" . $row['id']  .  "'>edit</a></td>";
		echo "</tr> \n";
		
	}


?>

</table>
		
	</div>
</div>

	</body>
</html>	