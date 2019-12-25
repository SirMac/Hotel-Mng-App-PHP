<?php
session_start();
if($_SESSION['username']==null){
//	$_SESSION['msg'] = "Log in First";
    echo "Log in First";
	header("location: index.html");
}


//==================Update Booking====================
if($_GET['frmid']==1){
	require_once './auth.php';
	$sql2 = "UPDATE booking
	SET first_name='".$_POST['firstname']."', last_name='".$_POST['lastname']."', email ='".$_POST['email']."', telephone_no ='".$_POST['telephone']."', checkin_date ='".$_POST['checkin']."', checkout_date ='".$_POST['checkout']."'
	WHERE booking_id=".$_POST['bookingid'].";" ;
	$result2 = mysqli_query($dbhandle,$sql2);
	if(mysqli_error($dbhandle)){echo "Cannot Uppdate Booking Table";}
	
	
header("Refresh: 1;url=detail.php?booking=".$_POST['bookingid']."");
require_once "loader.php";
}


//===============Check In Customer=============== 

if($_GET['frmid']==2){

	include './auth.php';
	$id = $_POST['bookingid'];

	$sql2 = "UPDATE booking
	SET payment_status='".$_POST['paymentstatus']."' WHERE booking_id=".$id.";" ;
	$result2 = mysqli_query($dbhandle,$sql2);
	if(mysqli_error($dbhandle)){echo "Cannot Uppdate PaymentStatus in Booking Table";}

	$loopcount = "".$_POST['loopcount']."";
	$loopcount2 = "".$_POST['loopcount2']."";

	for ($v=1; $v<=$loopcount; $v++) {
		$roomid[] ="".$_POST['roomid'.$v.'']."";

		for ($w=1; $w<=$loopcount2; $w++) {
		if(isset($_POST['room_no'.$v.$w.''])){
		$rmnos[] = $_POST['room_no'.$v.$w.''];

		//Update table data without overwrite
		$sql3 = "UPDATE roomnumbers
		SET occupied_rm = concat(occupied_rm,',','".$_POST['room_no'.$v.$w.'']."') WHERE room_id=".$_POST['roomid'.$v.''].";" ;
		$res3 = mysqli_query($dbhandle,$sql3);
		if(mysqli_error($dbhandle)){echo "Cannot Update Occupied_rm in Roomnumbers Table<br>";}

		$sql5 = "UPDATE roombook
		SET room_no = concat(room_no,',','".$_POST['room_no'.$v.$w.'']."') WHERE booking_id=".$id." AND room_id=".$_POST['roomid'.$v.''].";" ;
		$res5 = mysqli_query($dbhandle,$sql5);
		if(mysqli_error($dbhandle)){echo "Cannot Update Room_No in Roombook Table<br>";}
}}}
/*
	echo "<pre>";
	print_r($rmnos);
	print_r($roomid);
	echo "</pre>";*/

for ($x=0; $x<count($roomid); $x++) {
	$res4 = mysqli_query($dbhandle, "select * from roomnumbers where room_id=".$roomid[$x]."");
	if(mysqli_num_rows($res4) > 0){
		while ($row4 = mysqli_fetch_array($res4) ){
			$occupied_rm_str = $row4['occupied_rm'];
			$room_no = json_decode($row4['room_no'],true);
		}
	}

	$occupied_rm_ary =  explode(",", $occupied_rm_str); // convert string to array
	$available_rm_ary = array_diff($room_no, $occupied_rm_ary);
	if($available_rm_ary==null){
		$available_rm_ary = '0';
	}
	else{
	$bb = array_combine(range(1, count($available_rm_ary)), array_values($available_rm_ary));
	$available_rm_json = json_encode($bb,true);
}
/*
	print_r($room_no);
	echo "<br>";
	print_r($occupied_rm_ary);
	echo "<br>";
	print_r($available_rm_json);
	echo "<br><br>";
*/
	$sql3 = "UPDATE roomnumbers
		SET available_rm = '".$available_rm_json."' WHERE room_id=".$roomid[$x].";" ;
		$res3 = mysqli_query($dbhandle,$sql3);
		if(mysqli_error($dbhandle)){echo "Cannot Uppdate Available_rm in Roomnumbers Table";}
}


header("Refresh: 1;url=dashboard.php");
require_once "loader.php";

}


//====================Delete Booking======================
 
if($_GET['frmid']==3){
	
	include './auth.php';
	$id = $_GET['bid'];
	$rid = $_GET['rid'];

$res2 = mysqli_query($dbhandle, "SELECT * from booking WHERE booking_id=".$id.";");
  if(mysqli_error($dbhandle)){echo " Checkout: Cannot Select from Booking Table ";}
  if(mysqli_num_rows($res2) > 0){
    while ($row = mysqli_fetch_array($res2) ){
      $name = "".$row['first_name']." ".$row['last_name']."";
      $email = $row['email'];
      $tel_no = $row['telephone_no'];
      $address = "".$row['add_line1']." ".$row['city']."";
      $checkin_date = $row['checkin_date'];
      $checkout_date = $row['checkout_date'];
      $total_adults = $row['total_adult'];
      $total_children = $row['total_children'];
      $booking_status = $row['payment_status'];
      $total_amount = $row['total_amount'];
      $booking_date = $row['booking_date'];
}}

//=====Release Rooms After Delete from Bookings (a=roombook, b=room, c=roomnumbers)========
//$re03 = mysqli_query($dbhandle, "SELECT roombook.totalroombook AS totalrm, room.room_name AS name from roombook LEFT JOIN room ON roombook.room_id = room.room_id WHERE booking_id=".$id."");

$re03 = mysqli_query($dbhandle, "SELECT a.totalroombook AS totalrm, b.room_name AS name, b.room_id AS rmid, c.total_occupied AS totalrm2 from roombook a INNER JOIN room b ON a.room_id = b.room_id INNER JOIN roomnumbers c ON a.room_id = c.room_id WHERE booking_id=".$id."");
  if(mysqli_error($dbhandle)){echo " Checkout: Cannot Select from Roombook Table ";}
  if(mysqli_num_rows($re03) > 0){
    while ($row03 = mysqli_fetch_array($re03)){
    	$totalrm = $row03['totalrm2'] - $row03['totalrm'];
    	if($totalrm>=0){
    	mysqli_query($dbhandle,"UPDATE roomnumbers SET total_occupied = '".$totalrm."' WHERE room_id=".$row03['rmid']."");
    	}
    }}


$delete_date = date("Y-m-d h:i:s a");
$res3 = mysqli_query($dbhandle, "SELECT * from roombook WHERE booking_id=".$id.";");
  if(mysqli_error($dbhandle)){echo " Checkout: Cannot Select from Roombook Table ";}
  if(mysqli_num_rows($res3) > 0){
    while ($row2 = mysqli_fetch_array($res3)){
      $total_amt = $row2['amt_paid'];

    $res0 = mysqli_query($dbhandle, "SELECT * from room WHERE room_id=".$row2['room_id'].";");
      if(mysqli_error($dbhandle)){echo " Checkout: Cannot Select from Room Table ";}
      if(mysqli_num_rows($res0) > 0){
        while ($row0 = mysqli_fetch_array($res0)){
          $totalroombook[] = "".$row2['totalroombook']." ".$row0['room_name'].""; 
        }}

      $room_id = $row2['room_id'];
      $room_no = $row2['room_no'];
  }}
	//  echo $room_no;

	  $totalroombook2 = implode(",", $totalroombook);

	mysqli_query($dbhandle, "INSERT INTO `deletedbooking` (`booking_id`,`total_adult`, `total_children`, `checkin_date`, `checkout_date`, `total_room`,`booking_status`, `total_amount`, `booking_date`, `client_name`, `email`, `telephone_no`, `address`, `delete_date`, `deleted_by`) VALUES ('".$id."', '".$total_adults."', '".$total_children."', '".$checkin_date."', '".$checkout_date."', '".$totalroombook2."', '".$booking_status."', '".$total_amount."', '".$booking_date."', '".$name."', '".$email."', '".$tel_no."', '".$address."', '".$delete_date."', '".$_SESSION['username']."');");
  if(mysqli_error($dbhandle)){echo " Checkout: Cannot Insert into checkoutrecord Table ",mysqli_error($dbhandle);}

	mysqli_query($dbhandle,"DELETE FROM booking WHERE booking_id=".$id."");
	mysqli_query($dbhandle,"DELETE FROM roombook WHERE booking_id=".$id."");
	if(mysqli_error($dbhandle)){echo "Cannot Delete From Booking & Roombook";}


header('Refresh: 1;url=dashboard.php');
require_once "loader.php";
}



//==================Delete Client Message====================
if($_GET['frmid']==4){
	
	include './auth.php';
	$msgid = $_GET['msgid'];

mysqli_query($dbhandle,"DELETE FROM contact WHERE id=".$msgid."");

	
header("Refresh: 1;url=dashboard.php");
require_once "loader.php";
}
?>


