<?php
include_once('header.php');
?>

<h1>Orders</h1>
<div class="row">
	<div class="col-xs-12">
	<div class="col-xs-1"></div>
	<div class="col-xs-10">

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
	</thead>

<?php
	/*
	 *List all products in the database
	 *
	 */
	
	
	//conect to the database
	$db = connectDB($DBHost,$DBUser, $DBPasswd, $DBName);
	
	// set up a query to get info on the order form the db
	$query = "SELECT orders.id, orders.customerName, orders.itemsOrdered, orders.totalPrice, orders.orderStatus FROM orders order by orderStatus;";
	
	//run the query
	$result = queryDB($query, $db);
	
	while($row = nextTuple($result)) {
		
		echo "\n <tr>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['customerName'] . "</td>";
		echo "<td>" . $row['itemsOrdered'] . "</td>";
		echo "<td>" . $row['totalPrice'] . "</td>";
		echo "<td>" . $row['orderStatus'] . "</td>";
		echo "</tr> \n";
		
	}



?>
		</table>
		<a href='customerSide.php' class='btn btn-default glyphicon glyphicon-menu-left'>Back</a>
		</div>
	<div class="col-xs-1"></div>
	</div>
</div>




	</body>
</html>
