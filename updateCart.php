<?php
session_start();
include_once("config.php");
include_once('dbutils.php');

// make sure they are logged in or not logged in
// make sure we have order id
// insert into orderedProducts
// will end up with an order id

// if (logged in){query
	// if (shopping cart created){
	//}
	//else{$_SESSION['order.id']
	// create new order}
	//else {
	// if shopping cart not existing{
	//} create new order}
	

// select customers.customerName, orders.id .........

// select product, price FROM inventory WHERE order.id= orderedProducts.id
// AND inventory.id = orderedProducts.id


//add product to session or create new one
if(isset($_POST["type"]) && $_POST["type"]=='add' && $_POST["unit"]>0)
{

	foreach($_POST as $key => $value){ //add all post vars to new_product array
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    }
	//remove unecessary vars
	unset($new_product['type']);
	unset($new_product['return_url']); 
	
 	//we need to get product name and price from database.
	//connect to the database
	$db = connectDB($DBHost, $DBUser, $DBPasswd, $DBName);
	
	// set up a query to get info on the cars form the db
	$query = "SELECT product, price FROM inventory WHERE id=" . $new_product['id'] . " LIMIT 1";
	
	//run the query
	$result = queryDB($query, $db);
	
	$tuple = nextTuple($result);
	
	//fetch product name, price from db and add to new_product array
        $new_product["product"] = $product; 
        $new_product["price"] = $price;
        
        if(isset($_SESSION["cart_products"])){  //if session var already exist
            if(isset($_SESSION["cart_products"][$new_product['id']])) //check item exist in products array
            {
                unset($_SESSION["cart_products"][$new_product['id']]); //unset old array item
            }           
        }
        $_SESSION["cart_products"][$new_product['id']] = $new_product; //update or create product session with new item
		
    }
}

/*
//update or remove items 
if(isset($_POST["unit"]) || isset($_POST["remove_code"]))
{
	//update item quantity in product session
	if(isset($_POST["unit"]) && is_array($_POST["unit"])){
		foreach($_POST["unit"] as $key => $value){
			if(is_numeric($value)){
				$_SESSION["cart_products"][$key]["unit"] = $value;
			}
		}
	}
	//remove an item from product session
	if(isset($_POST["remove_code"]) && is_array($_POST["remove_code"])){
		foreach($_POST["remove_code"] as $key){
			unset($_SESSION["cart_products"][$key]);
		}	
	}
}

//back to return url
$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url
header('Location:'.$return_url);
*/
?>