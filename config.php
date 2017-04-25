<?php
$currency = '&#8377; '; //Currency Character or code

$shipping_cost      = 1.50; //shipping cost
$taxes              = array( //List your Taxes percent here.
                            'VAT' => 12, 
                            'Service Tax' => 5
                            );                      
//connect to MySql   
// Site configuration.

// Server information.
$Proto = "http://";
$Host = $_SERVER['SERVER_NAME'];
$Base = "/~ckenney/hw5/";

// Title to use in browser title bar.
$Title = "Cars Database";
$Name = "Colin Kenney";
$Email = "colin-kenney@uiowa.edu";
$Logo = "dial.png";

// DB connection (from  mysql_db_info file).
$DBUser = "ckenney";
$DBName = "db_ckenney";
$DBHost = "dbdev.cs.uiowa.edu";
$DBPasswd = "E8G4dcsHxvhQ";

?>
