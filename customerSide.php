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

<!-- Menu bar -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav navbar-left">
    	<li><a class="navbar-brand" href="#">Grocery Hawk</a></li>
        <li class="active"><a href="customerSide.php">Inventory</a></li>
        <li><a href="customerOrders.php">Orders</a></li>
     </ul>
     <ul class="nav navbar-nav navbar-right">
<!-- Search bar -->
		<li>
		<!--form class="navbar-form" role="search">
		<form action="" method="post">  
		<input type="text" name="term" id=“term” /><br />  
		<input type="submit" value="Submit" />  
		</form-->
		<form class="navbar-form navbar-left" role="search">
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Search" name="term" id=“term”>
        </div>
        <button type="submit" class="btn btn-default">Go!</button>
        </form>
        <!--div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div-->
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


<!-- welcome user -->
<!--div class="row">
    <div class="col-xs-10">
        <p><?php if(isset($_SESSION['email'])) echo 'Welcome:' . '&nbsp' . $_SESSION['email']; ?></p>
    </div>
</div-->


<!-- show contents of items table -->
<div class="row">
	<div class="col-xs-12">
	<div class="col-xs-1"></div>
		
<!-- Set up html table to show contents -->
<div class="col-xs-10">
<table class="table table-hover">
	<!-- headers for table -->
	<thead>
		<th>Category</th>
		<th>Product</th>
		<th>Unit</th>
		<th>Price</th>
		<th>Stock</th>
		<th></th>
	</thead>
	
<?php
	/*
	 *List all products in the database
	 *
	 */
	
	
	//conect to the database
	$db = connectDB($DBHost,$DBUser, $DBPasswd, $DBName);
	$term = $_GET['term']; 
	
	if (!empty($term)) {

	//$term = mysql_real_escape_string($_REQUEST['term']);


	$query = "SELECT inventory.category, inventory.product, inventory.unit, inventory.price, inventory.stock, inventory.id FROM inventory WHERE inventory.product LIKE '%".$term."%'"; 

	$result = queryDB($query, $db);


	while($row = nextTuple($result)) {
		
		echo "\n <tr>";
		echo "<td>" . $row['category'] . "</td>";
		echo "<td>" . $row['product'] . "</td>";
		echo "<td>" . $row['unit'] . "</td>";
		echo "<td>" . $row['price'] . "</td>";
		echo "<td>" . $row['stock'] . "</td>";
		echo "<td><a href='shopCart.php.php?id=" . $row['id']  .  "'>Add to Cart</a></td>";
		echo "</tr> \n";
	}

	}
	
	// set up a query to get info on the cars form the db
	else{
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
		echo "<td><a href='shopCart.php.php?id=" . $row['id']  .  "'>Add to Cart</a></td>";
		echo "</tr> \n";
	}
}
	
	
?>
	</table>
	<?php if (!empty($term)) echo "<a href='customerSide.php' class='btn btn-default glyphicon glyphicon-menu-left'>Back</a>";?>
	</div>
	<div class="col-xs-1"></div>
	</div>
</div>

	</body>
</html>
