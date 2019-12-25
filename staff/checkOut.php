<?php
session_start();
if($_SESSION['username']==null){
 // $_SESSION['msg'] = "Log in First";
    echo "Log in First";
  header("location: index.html");
}

require_once 'auth.php';

  $bid = $_GET['bid'];
  $rid = $_GET['rid'];
  $balance = $_SESSION['balance'];
  $user1 = $_SESSION['username'];


  if($balance>0){
    echo "<script>alert('Clear Outstanding Balance Before Checkout');</script>";
    header('Refresh:0;url=b4checkOut.php?bid='.$bid.'&rid='.$rid.'');
  }

else{
  unset($_SESSION['balance']);

//===Release Rooms from roomnumbers After Checkout (a=roombook, b=room, c=roomnumbers)====
$re03 = mysqli_query($dbhandle, "SELECT a.totalroombook AS totalrm, b.room_name AS name, b.room_id AS rmid, c.total_occupied AS totalrm2 from roombook a INNER JOIN room b ON a.room_id = b.room_id INNER JOIN roomnumbers c ON a.room_id = c.room_id WHERE a.booking_id=".$bid." AND a.room_id=".$rid."");
  if(mysqli_error($dbhandle)){echo " Checkout: Cannot Select from Roombook Table ";}
  if(mysqli_num_rows($re03) > 0){
    while ($row03 = mysqli_fetch_array($re03)){
      $totalrm = $row03['totalrm2'] - $row03['totalrm'];
      if($totalrm>=0){
      mysqli_query($dbhandle,"UPDATE roomnumbers SET total_occupied = '".$totalrm."' WHERE room_id=".$row03['rmid']."");
      }
    }}


  $res2 = mysqli_query($dbhandle, "SELECT * from booking WHERE booking_id=".$bid.";");
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
   //   $total_amt = $row['total_amount'];
}}

  $res3 = mysqli_query($dbhandle, "SELECT * from roombook WHERE booking_id=".$bid." AND room_id=".$rid.";");
  if(mysqli_error($dbhandle)){echo " Checkout: Cannot Select from Roombook Table ";}
  if(mysqli_num_rows($res3) > 0){
    while ($row2 = mysqli_fetch_array($res3)){
      $total_amt = $row2['amt_paid'];

    $res0 = mysqli_query($dbhandle, "SELECT * from room WHERE room_id=".$rid.";");
      if(mysqli_error($dbhandle)){echo " Checkout: Cannot Select from Room Table ";}
      if(mysqli_num_rows($res0) > 0){
        while ($row0 = mysqli_fetch_array($res0)){
          $totalroombook = "".$row2['totalroombook']." ".$row0['room_name'].""; 
        }}

      $room_id = $row2['room_id'];
    //  $totalroombook = "".$row2['totalroombook']." ".$rmname."";
      $room_no = $row2['room_no'];

  mysqli_query($dbhandle, "INSERT INTO `checkoutrecord` (`name`, `email`, `tel_no`, `address`,`booking_id`,`checkin_date`, `checkout_date`, `total_adults`, `total_children`, `room_id`, `totalroombooked`, `room_no`, `total_amt`, `checkedout_by`) VALUES ('".$name."', '".$email."', '".$tel_no."', '".$address."', '".$bid."', '".$checkin_date."', '".$checkout_date."', '".$total_adults."', '".$total_children."', '".$room_id."', '".$totalroombook."', '".$room_no."', '".$total_amt."', '".$user1."');");
  if(mysqli_error($dbhandle)){echo " Checkout: Cannot Insert into checkoutrecord Table ",mysqli_error($dbhandle);}


//=============Update RoomNumbers with room numbers released============================
  $res5 = mysqli_query($dbhandle, "select * from roomnumbers where room_id=".$rid."");
  if(mysqli_num_rows($res5) > 0){
    while ($row5 = mysqli_fetch_array($res5) ){
      $occupied_rm_str = $row5['occupied_rm'];
      $available_rm_ary = json_decode($row5['available_rm'],true);
      
    }
  }

  $free_roomno_ary = explode(',', $room_no); //Rooms customer occupied
  array_shift($free_roomno_ary); //remove first element

  $occupied_rm_ary =  explode(",", $occupied_rm_str); //Total rooms currently occupied
  array_shift($occupied_rm_ary);
  $occupied_rm_ary_now = array_diff($occupied_rm_ary,$free_roomno_ary); //Get Remaining Occupied Rm
  if($occupied_rm_ary_now==null){$occupied_rm_now ="";}
  else{ $occupied_rm_now = implode(',',$occupied_rm_ary_now); }
 

  //$free_roomno_ary + $available_rm_ary =  $available_rm_ary_now
  if($available_rm_ary==null){ $available_rm_ary_now = $free_roomno_ary; }
  else{ $available_rm_ary_now = array_merge($free_roomno_ary,$available_rm_ary);}

  $bb = array_combine(range(1, count($available_rm_ary_now)), array_values($available_rm_ary_now));
  $available_rm_json = json_encode($bb,true);  //insert into available_rm
/*
  echo "<br> Customer Room No. Array: === "; print_r($free_roomno_ary);
  echo "<br> Occupied Room From DB: === "; print_r($occupied_rm_str);
  echo "<br> Occupied Room From DB Array: === "; print_r($occupied_rm_ary);
  echo "<br> Available Room From DB: === "; print_r($available_rm_ary);
 
  echo "<br><br><br> Occupied Room Now Array: === "; print_r($occupied_rm_ary_now);
  echo "<br> Available Room Now Array: === "; print_r($available_rm_ary_now);

  echo "<br><br><br> Available Room JSON. Insert Into Table: === "; print_r($available_rm_json);
  echo "<br> Occupied Room Str. Insert Into Table: === "; print_r($occupied_rm_now);
*/

//============Update roomnumbers with rooms from customer checkout==================
 $sql6 = "UPDATE roomnumbers
 SET occupied_rm = '".$occupied_rm_now."', available_rm = '".$available_rm_json."' WHERE room_id=".$rid.";" ;
 $res6 = mysqli_query($dbhandle,$sql6);
 if(mysqli_error($dbhandle)){echo "Cannot Uppdate Available_rm & Occupied_rm in Roomnumbers Table";}

} //end roombook query while statement

//===================Delete from Room Booking==================
    $sqldb2 = "DELETE FROM roombook WHERE booking_id=".$bid." AND room_id=".$rid.";";
    mysqli_multi_query($dbhandle,$sqldb2);
    if(mysqli_error($dbhandle)){echo " Checkout: Cannot Delete from Booking Or Roombook ",mysqli_error($dbhandle);}
    
}//end roombook query if statement

//}}  


//============Delete from Booking When there is No Entry in Roombook
$res4 = mysqli_query($dbhandle, "SELECT * from roombook WHERE booking_id=".$bid.";");
  if(mysqli_error($dbhandle)){echo " Checkout: Cannot Select from Roombook Table ";}
  if(mysqli_num_rows($res4) == 0){
      mysqli_query($dbhandle,"DELETE FROM booking WHERE booking_id=".$bid."");
      if(mysqli_error($dbhandle)){echo " Checkout: Cannot Delete from Booking ",mysqli_error($dbhandle);}
    }



header("Refresh: 1;url=dashboard.php"); 
require_once "loader.php";
}
?>