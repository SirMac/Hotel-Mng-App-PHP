<?php
//define(ROOT_DIR, __DIR__);
//define(ROOT_DIR, realpath(__DIR__ . 'HotelB/'));

session_start();
if($_SESSION['username']==null){
	//$_SESSION['msg'] = "Log in First";
    echo "Log in First";
	header("location: ../index.html");
}

$homepage = "Reports";
$nav1 = "menu__item";
$nav2 = "menu__item";
$nav3 = "menu__item menu__item--current";
require_once "header.php";
require_once 'auth.php';

$na0 = "menu__item";
$na1 = "menu__item";
$na2 = "menu__item active";
$na3 = "menu__item";
$na4 = "menu__item";
$rtitle = "Booking Summary Report";
require_once 'searchReport.php';

 if (isset($_POST['submit'])) {
 $rdate = $_POST["dreport"];
 $rdate2 = $_POST["dreport2"];
 if($rdate>$rdate2){echo"<script>alert(\"Start date Cannot be Greater Than End Date\");</script>";}
 else{
?>
 

<br>
<!-- =======================Booking Report==================-->
<div class="row">
<div class="col-lg-6 col-lg-offset-3" style="box-shadow: 0 5px 5px rgba(0, 0, 0, 0.5);">
<div class="table-responsive small" id="pending-booking">
<table class="table table-striped" id="pbTable" width="100%">
    <thead style="background-color: #e5e9e6;">
        <tr style="height: 30px; line-height: 30px">
          <th>Reservation Summary</th>
		  <th>Total</th>			
        </tr>
    </thead>
    <tbody>
        
<?php
$ir=0;

$re0 = mysqli_query($dbhandle, "select count(booking_id) as total_row from booking WHERE checkin_date >= '".$rdate."' AND checkin_date <= '".$rdate2."';");
$row0 = mysqli_fetch_array($re0);

$re1 = mysqli_query($dbhandle, "select count(booking_id) as total_row from booking WHERE payment_status like 'conf%' AND checkin_date >= '".$rdate."' AND checkin_date <= '".$rdate2."';");
$row1 = mysqli_fetch_array($re1);

$re2 = mysqli_query($dbhandle, "select count(booking_id) as total_row from booking WHERE payment_status like 'pend%' AND checkin_date >= '".$rdate."' AND checkin_date <= '".$rdate2."';");
$row2 = mysqli_fetch_array($re2);

$re3 = mysqli_query($dbhandle, "select count(booking_id) as total_row from booking WHERE payment_status like 'expi%' AND checkout_date >= '".$rdate."' AND checkout_date <= '".$rdate2."';");
$row3 = mysqli_fetch_array($re3);

$re4 = mysqli_query($dbhandle, "select count(booking_id) as total_row from deletedbooking WHERE delete_date >= '".$rdate."' AND delete_date <= '".$rdate2."';");
$row4 = mysqli_fetch_array($re4);

$re5 = mysqli_query($dbhandle, "select count(booking_id) as total_row from checkoutrecord WHERE checkedout_datetime >= '".$rdate."' AND checkedout_datetime <= '".$rdate2."';");
$row5 = mysqli_fetch_array($re5);

echo"<tr>
	<td>Total Booking</td>
	<td>".$row0['total_row']."</td>
	</tr>
	<tr>
	<td>Total Pending Booking</td>
	<td>".$row2['total_row']."</td>
	</tr>
	<tr>
	<td>Total Expired Booking</td>
	<td>".$row3['total_row']."</td>
	</tr>
	<tr>
	<td>Total Cancelled Booking</td>
	<td>".$row4['total_row']."</td>
	</tr>
	<br>
	<tr>
	<td>Total Checked-In</td>
	<td>".$row1['total_row']."</td>
	</tr>
	<tr>
	<td>Total Checked-Out</td>
	<td>".$row5['total_row']."</td>
	</tr>
	";

	}
}
?>
		                
</tbody>
</table>		
</div>
</div>
</div>
</div>
<!--/div>
</div-->


<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.min.js"></script>


<script>
$(document).ready(function() {
	$("#dreport,#dreport2").datepicker({ dateFormat: 'yy-mm-dd'});
});

</script>


</body>
</html>

