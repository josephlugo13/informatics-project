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
<img src="gh.jpg" height=auto width="1240">
<!-- Menu bar -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav navbar-left">
        <li><a href="customerSide.php"><span class="glyphicon glyphicon-grain"></span> Inventory</a></li>
        <li><a href="viewCart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</a></li>
     </ul>
     <ul class="nav navbar-nav navbar-right">
     	<!--li>
     		<div style="display:table;" class="input-group">
            <span style="width: 1%;" class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
            <input type="text" autofocus="autofocus" autocomplete="off" placeholder="Search Here" name="search" style="" class="form-control">
          </div-->
     	</li>
		<li>
		<form class="navbar-form navbar-right" role="search">
			<div class="form-group">
				<input style="width:680px;" type="text" class="form-control" placeholder="Search by product or category" name="term" id=“term”>
				</div>
			<button type="submit" class="btn btn-default">Go!</button>
			</form>
		</li>
		<li style="margin-left: 0.4em;" class="dropdown">
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
			<li><a href='Account.php'>Account Information</a></li>
            <li><a href='OrderC.php'>Order History</a></li>
            <li><a href='#'>Help</a></li>
            <!--li role='separator' class='divider'></li-->";}
             else{
				echo "<li><a href='customerLogin.php'>Please Login</a></li>";
			}?>
			</ul>
			</li>		
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
			background: rgb(255,255,255); /* Old browsers */
background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 48%, rgba(186,186,186,1) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(255,255,255,1) 48%,rgba(186,186,186,1) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, rgba(255,255,255,1) 0%,rgba(255,255,255,1) 48%,rgba(186,186,186,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#bababa',GradientType=0 ); /* IE6-9 */
            text-align: center;
        }

}

</style>


