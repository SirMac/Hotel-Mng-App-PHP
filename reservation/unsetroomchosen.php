<?php
session_start();

if($_GET["unset"]==2){
unset($_SESSION['room_id']);
unset($_SESSION['roomname']);
unset($_SESSION['roomqty']);
unset($_SESSION['ind_rate']);
unset($_SESSION['total_amount']);
unset($_SESSION['deposit']);
header("location: checkroom.php");
}


if($_GET["unset"]==1){
	unset($_SESSION['checkin_date']);
	unset($_SESSION['checkout_date']);
	unset($_SESSION['checkin_db']);
	unset($_SESSION['checkout_db']);
	unset($_SESSION['datetime1']);
	unset($_SESSION['datetime2']);
	unset($_SESSION['checkin_unformat']); 
	unset($_SESSION['checkout_unformat']);
	unset($_SESSION['interval']);
	unset($_SESSION['total_night']);
	unset($_SESSION['adults']);
	unset($_SESSION['childrens']);
	header("location: ../dashboard.php");

}




?>