<?php
session_start();
 
if($_GET["unset"]==2){
	unset($_SESSION['room_id']);
	unset($_SESSION['roomname']);
	unset($_SESSION['roomqty']);
	unset($_SESSION['ind_rate']);
	unset($_SESSION['total_amount']);
	unset($_SESSION['deposit']);

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
	unset($_SESSION['guestform']);
	header("location: ../staff/dashboard.php");
}

if($_GET["unset"]==21){
	unset($_SESSION['room_id']);
	unset($_SESSION['roomname']);
	unset($_SESSION['roomqty']);
	unset($_SESSION['ind_rate']);
	unset($_SESSION['total_amount']);
	unset($_SESSION['deposit']);

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
	unset($_SESSION['guestform']);
	header("location: ../index.php");
}


if($_GET["unset"]==3){
	unset($_SESSION['firstname']);
	unset($_SESSION['lastname']);
	unset($_SESSION['email']);
	unset($_SESSION['phone']);
	unset($_SESSION['addressline1']);
	unset($_SESSION['city']);
	unset($_SESSION['country']);
	unset($_SESSION['special_requirement']);

	unset($_SESSION['room_id']);
	unset($_SESSION['roomname']);
	unset($_SESSION['roomqty']);
	unset($_SESSION['ind_rate']);
	unset($_SESSION['total_amount']);
	unset($_SESSION['deposit']);

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
	unset($_SESSION['guestform']);
	header("location: ../staff/dashboard.php");
}


if($_GET["unset"]==31){
	unset($_SESSION['firstname']);
	unset($_SESSION['lastname']);
	unset($_SESSION['email']);
	unset($_SESSION['phone']);
	unset($_SESSION['addressline1']);
	unset($_SESSION['city']);
	unset($_SESSION['country']);
	unset($_SESSION['special_requirement']);

	unset($_SESSION['room_id']);
	unset($_SESSION['roomname']);
	unset($_SESSION['roomqty']);
	unset($_SESSION['ind_rate']);
	unset($_SESSION['total_amount']);
	unset($_SESSION['deposit']);

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
	unset($_SESSION['guestform']);
	header("location: ../index.php");
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
	unset($_SESSION['guestform']);
	header("location: ../staff/dashboard.php");
}

if($_GET["unset"]==11){
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
	unset($_SESSION['guestform']);
	header("location: ../index.php");
}


if($_GET["unset"]==4){
	unset($_SESSION['total_amount']);
	header("location: checkroom.php");
}
?>