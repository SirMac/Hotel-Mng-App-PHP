<?php
session_start();
if($_SESSION['username']==null){
//	$_SESSION['msg'] = "Log in First";
    echo "Log in First";
	header("location: index.html");
}

require_once './auth.php';

$bid  = $_POST['bid'];
$rid  = $_POST['rid'];
$cname  = $_POST['cname'];
$rmtype  = $_POST['rmtype'];
$total_amt = $_POST['totalamt'];
$balance  = $_POST['balance'];
$deposit  = $_POST['amount'];
$amt_paid = $deposit + $_POST['amtpaid'];
//$balance2 = $total_amt - $amt_paid2;
$checkin  = $_POST['checkin'];
$checkout  = $_POST['checkout'];


if($deposit>$balance){
	echo "<script>alert('Amount Entered is Greater Than Remaing Balance');</script>";
	header('Refresh:0;url=b4checkOut.php?bid='.$bid.'&rid='.$rid.'');
}

else{

//===================Insert into Payment====================================
	$re = mysqli_query($dbhandle, "Select * from payment where booking_id=".$bid." AND room_id=".$rid."");
	if(mysqli_error($dbhandle)){echo " Cannot Find Information ";}
	if( mysqli_num_rows($re) == 0){
	mysqli_query($dbhandle, "INSERT INTO `payment` (`booking_id`, `room_id`, `name`, `roomtype`, `total_amt`,`deposit`,`checkin_date`,`checkout_date`) VALUES ('".$bid."', '".$rid."', '".$cname."', '".$rmtype."', '".$total_amt."', '".$amt_paid."', '".$checkin."', '".$checkout."');");
  	if(mysqli_error($dbhandle)){
  	echo " Checkout: Cannot Insert into Payment Table ",mysqli_error($dbhandle);}
  }

  else{
	mysqli_query($dbhandle,"UPDATE payment SET deposit = '".$amt_paid."' WHERE booking_id='".$bid."' AND room_id='".$rid."';");
	echo mysqli_error($dbhandle);
  }

//======================Insert into Roombook==============================
	mysqli_query($dbhandle,"UPDATE roombook SET amt_paid = amt_paid+'".$deposit."' WHERE booking_id='".$bid."' AND room_id='".$rid."';");
	echo mysqli_error($dbhandle);


header('Refresh: 1;url=b4checkOut.php?bid='.$bid.'&rid='.$rid.'');
require_once "loader.php";
}
?>