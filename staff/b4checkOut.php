
<?php
session_start();
if($_SESSION['username']==null){
//	$_SESSION['msg'] = "Log in First";
    echo "Log in First";
	header("location: index.html");
}

$homepage = "Check Out";
$nav1 = "menu__item";
$nav2 = "menu__item";
$nav3 = "menu__item";
require_once "header.php";

	
require_once ('auth.php');
$id = $_GET['bid'];
$rid = $_GET['rid'];


//$id = $row['booking_id'];
$troom = "";
$address = '';
$tel = '';
$email = '';
$city = '';
$country = '';
$checkin = '';
$checkout = '';
$name = '';
$rmtype = "";
$room_no = "";
$roomid = "";
$roomrate = "";
$rmtotal = "";
$amtpaid = '';
$subtotal = '';

	
	
$re = mysqli_query($dbhandle, "Select * from booking where booking_id=".$id."");
if(mysqli_error($dbhandle)){echo " Cannot Find Information ";}

if( mysqli_num_rows($re) >0){
while($row=mysqli_fetch_array($re))
{
	$id = $row['booking_id'];
	$troom = $row['total_adult'];
	$address = $row['add_line1'];
	$tel = $row['telephone_no'];
	$email = $row['email'];
	$city = $row['city'];
	$country = $row['country'];
	$checkin = $row['checkin_date'];
	$checkout = $row['checkout_date'];
//	$totalamt = $row['total_amount'];
	$name = "".$row['first_name']." ".$row['last_name']."";

}}

$q = mysqli_query($dbhandle, "SELECT roombook.totalroombook AS total, roombook.room_no AS rm_no, room.room_name AS name, room.room_id AS rm_id, room.rate AS rm_rate, roombook.amt_paid AS amtpaid FROM roombook LEFT JOIN room ON roombook.room_id = room.room_id WHERE roombook.booking_id =".$id." AND roombook.room_id =".$rid.";");
if(mysqli_error($dbhandle)){echo " Cannot Find Information ";}

	if( mysqli_num_rows($q) >0){
		while($r = mysqli_fetch_array($q))
		{
		   $rmtype = "".$r['total']."  ".$r['name']."";
		   $room_no = "".$r['rm_no']."";
		   $roomid = "".$r['rm_id']."";
		   $roomrate = "".$r['rm_rate']."";
		   $rmtotal = "".$r['total']."";
		   $amtpaid = "".$r['amtpaid']."";
		   if($amtpaid==""){$amtpaid=0;}
		   $subtotal = $roomrate*$rmtotal;
		}
	}
     

echo "
	<div class=\"row bg-default\" style=\"padding:5px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5)\">
 	<div class=\"col-lg-4\">
	<button onclick=\"window.print()\" class='btn btn-warning'>Print Invoice</button>
	</div>
	<div class=\"col-lg-4 text-center\">
	<a href='#?cname=".$name."&bid=".$id."&rid=".$roomid."&rmtype=".$rmtype." ' class='btn btn-warning' id='pay'>Make Payment</a>
	</div>
 	<div class=\"col-lg-4 text-right\">
	<a href='#' class='btn btn-warning' id='chkout'>Checkout</a>
	</div></div><br>
	";
									
	?>
<div class="container-fluid">
<div class="row">
<div class="col-lg-2"></div>
 <div class="col-lg-8" id="printme" style="box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5); padding-top: 15px">
	<div class="text-center">
			<h3>HOTEL NAME</h3>
				<p>Address Accra, Ghana.</p>
				<p>(+233) 123 123 123</p>
			<span><img alt="" src="./images/logo.png"></span>
	</div>
<br>
		
   <div class="row">
		<div class="col-lg-5 table-responsive small" style="float: left;">
			<table class="table">
				<tr>
					<th class="bg-success"><span >Name</span></th>
					<td><span ><?php echo $name; ?></span></td>
				</tr>
				<tr>
					<th class="bg-success"><span >Telephone</span></th>
					<td><span ><?php echo $tel; ?> </span></td>
				</tr>
				<tr>
					<th class="bg-success"><span >Email</span></th>
					<td><span ><?php echo $email; ?></span></td>
				</tr>
				<tr>
					<th class="bg-success"><span >Address</span></th>
					<td><span ><?php echo $address." ".$city." ".$country; ?></span></td>
				</tr>
			</table>
		</div>
		<div class="col-lg-3"></div>
		<div class="col-lg-4 table-responsive small text-right">
			<table class="table">
				<tr>
					<th class="bg-success"><span >Booking #</span></th>
					<td><span ><?php echo $id; ?></span></td>
				</tr>
				<tr>
					<th class="bg-success"><span >Date</span></th>
					<td><span ><?php echo date("Y/m/d"); ?> </span></td>
				</tr>
				<tr>
					<th class="bg-success"><span >Room Type</span></th>
					<td><span ><?php echo $rmtype; ?></span></td>
				</tr>
				<tr>
					<th class="bg-success"><span >Room No.</span></th>
					<td><span ><?php echo $room_no; ?></span></td>
				</tr>
			</table>
		</div>
	</div>

		<div class="row">
		<div class="col-lg-12">
			<table class="table table-responsive small">
				<thead>
					<tr class="bg-primary">
						<th class="text-center"><span >Date</span></th>
						<th class="text-center"><span >Description</span></th>
						<th class="text-center"><span >Charges</span></th>
					</tr>
				</thead>
				<tbody>
		<?php 
//=================Output Each Day Between CheckIn and Today============================
			date_default_timezone_set('UTC');
			$checkin1 = new DateTime($checkin);
			$checkout1 = new DateTime($checkout);
			$today = new DateTime(date('Y-m-d'));
			$nights = 0;

			$interval = new DateInterval('P1D');
		//	$period = new DatePeriod($checkin1,$interval,$checkout1);
			$period = new DatePeriod($checkin1,$interval,$today);

		if($today <= $checkout1){
			foreach ($period as $value) {
				$nights++;	
		
		?>
			<tr class="text-center">
				<td><span ><?php echo $value->format("Y-m-d"); ?></span></td>
				<td><span ><?php echo "Room Charges"; ?> </span></td>
				<td><span data-prefix>GHS </span><span ><?php  echo $subtotal;?></span></td>
			</tr>	
<?php 
}}

//else{echo 'Checkin Expired';}
$roomcost = $subtotal*$nights;
$balance = $roomcost-$amtpaid;
$_SESSION['balance'] = $balance;
?>

 	</tbody>
</table>
</div>
</div>

	<div class="row">
		<div class="col-lg-8"></div>
		<div class="col-lg-4">
			<table class="table table-responsive small text-right">
				<tr>
					<th><span >Total</span></th>
					<td><span data-prefix>GHS </span><span><?php echo $roomcost; ?></span></td>
				</tr>
				<tr>
					<th><span >Amount Paid</span></th>
					<td><span data-prefix>GHS </span><span ><?php echo $amtpaid; ?></span></td>
				</tr>
				<tr>
					<th><span >Balance Due</span></th>
					<td><span data-prefix>GHS </span><span><?php echo $balance; ?></span></td>
				</tr>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4 small text-center">
			<br><h5>Customer Sigout</h5><hr><br>
				<p>Sign: ---------------------------- </p><br>
				<p>Date: ---------------------------- </p><br>
			</div>
	</div>
<br><br>
	<div class="row">
		<div class="col-lg-12 small text-center bg-primary">
			<h3>Contact us</h3>
				<p align="center">Email :- info@hotel.com || Web :- www.hotel.com || Phone :- +233123123123 </p>
			</div>
	</div>
		
</div>
</div>
</div>

 

<!--============= Make Payment ==============-->

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header sm-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title">Make Payment</h6>
      </div>

    <div class="modal-body">
	<form action="makePayment.php" method="post">
		<input type="hidden" name="bid" value='<?php echo $id; ?>'>
		<input type="hidden" name="rid" value='<?php echo $roomid; ?>'>
		<input type="hidden" name="balance" value='<?php echo $balance; ?>'>
		<input type="hidden" name="totalamt" value='<?php echo $roomcost; ?>'>
		<input type="hidden" name="amtpaid" value='<?php echo $amtpaid; ?>'>
		<input type="hidden" name="checkin" value='<?php echo $checkin; ?>'>
		<input type="hidden" name="checkout" value='<?php echo $checkout; ?>'>
		<div class="form-group">
	 	<h6>Client Name:</h6>	
		<input type="text" readonly="readonly" class="form-control" name="cname" value='<?php echo $name; ?>'>
		</div>
		<div class="form-group">
		<h6>Room Type:</h6>	
		<input type="text" readonly="readonly" class="form-control" name="rmtype" value='<?php echo "".$rmtype."";?>'>
		</div>
		<div class="form-group">
		<h6>Balance Due (GHS):</h6>	
		<input type="text" readonly="readonly" class="form-control" name="rmcost" value='<?php echo "".$balance."";?>'>
		</div>
		<div class="form-group">
		<h6>Payment Amount (GHS)</h6>	
		<input type="text" class="form-control" required name="amount" style="border-color: black">
		</div><br>
		<button type="submit" class="btn btn-success">Submit Payment</button>
	</form>
	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div> 



<!-- ==========CheckOut Customer=============== -->

<div id="ChkOut" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title">CheckOut Customer</h6>
      </div>
      <div class="modal-body">
      	<h6>Continue To Checkout Customer?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger tex-left" data-dismiss="modal">Cancel</button>
<?php echo "<a href='checkOut.php?bid=".$id."&rid=".$rid."' class='btn btn-primary'>Checkout</a>";?>
      </div>
    </div>
  </div>
</div> 


<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
	var a = document.getElementById("pay");
	a.onclick = function(e){
	$('#myModal').modal('show');
	}

	var b = document.getElementById("chkout");
	b.onclick = function(e){
	$('#ChkOut').modal('show');
	}
</script>

</body>
</html>

