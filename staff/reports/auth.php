<?php
$username = "root";
$password = "";
$hostname = "localhost"; 
$db = "unleashe_hotel";
//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password,$db) 
 or die(mysqli_error($dbhandle));

//select a database to work 
//$db = "unleashe_hotel";
//$selected = mysql_select_db($db,$dbhandle) 
//  or die("Could not select database");


?>