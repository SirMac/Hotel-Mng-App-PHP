<?php
$username = "root";
$password = "";
$hostname = "localhost"; 
$db = "unleashe_hotel";
//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password,$db) 
 or die(mysql_error());

//select a database to work 

//$selected = mysqli_select_db($db,$dbhandle) 
//  or die(mysql_error());


?>