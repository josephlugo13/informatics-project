<?php
include_once('header.php');
?>
<h1>Account Information</h1>
<div class="row">
	<div class="col-xs-12">
	<div class="col-xs-3"></div>

<div class="col-xs-6">
<form action="customerLogin.php" method="post">

		<?php
		$db = connectDB($DBHost, $DBUser, $DBPasswd, $DBName);
		$query = "SELECT * FROM users WHERE users.email LIKE '%".$_SESSION['email']."%'";

		//run the query
		$result = queryDB($query, $db);
		
		while($row = nextTuple($result)) {
			
			echo "<br>Customer Name: ".$row['customerName'];

			echo "<br><br><br>Email: ".$row['email'];

			echo "<br><br><br>Password: ***************";

			echo "<br><br><br>Home Address: ".$row['homeAddress'];

			echo "<br><br><br>Billing Address: ".$row['billingAddress'];

			echo "<br><br><br>Credit card number: ".$row['creditCard'];

			echo "<br><br><br>Credit card expiration date: ".$row['cardExp'];

			echo "<br><br><br>Credit CVV code: ".$row['cardCode'];

			echo "<br><br><br><a href='customerSide.php' class='btn btn-default glyphicon glyphicon-menu-left'>Back</a>";
		}
			?>
		</form>

	</div>
	<div class="col-xs-3"></div>
	</div>
</div>




	</body>
</html>
