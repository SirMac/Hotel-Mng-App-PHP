<?php
//define(ROOT_DIR, __DIR__);
//define(ROOT_DIR, realpath(__DIR__ . 'HotelB/'));

session_start();
if($_SESSION['username']==null){
    echo "Log in First";
	header("location: ../index.html");
}

$homepage = "Reports";
$nav1 = "menu__item";
$nav2 = "menu__item";
$nav3 = "menu__item menu__item--current";
require_once "header.php";
require_once 'auth.php';

$rtitle = "Arrival Report";
$na0 = "menu__item active";
$na1 = "menu__item";
$na2 = "menu__item";
$na3 = "menu__item";
$na4 = "menu__item";
require_once 'searchReport.php';

 if (isset($_POST['submit'])) {
 $rdate = $_POST["dreport"];
 $rdate2 = $_POST["dreport2"];
 if($rdate>$rdate2){echo"<script>alert(\"Start date Cannot be Greater Than End Date\");</script>";}
 else{
?>



<!-- =======================Departure Report==================-->
<div class="row">
<div class="col-lg-8 col-lg-offset-2" style="box-shadow: 0 5px 5px rgba(0, 0, 0, 0.5); margin-top: 10px">
<div class="table-responsive small" id="pending-booking">
<table class="table table-striped" id="pbTable" width="100%">
    <thead style="background-color: #e5e9e6;">
        <tr style="height: 30px; line-height: 30px">
          <th class="text-center">#</th>
          <th class="text-center">Client Name</th>
		  <th class="text-center">Check In</th>
		  <th class="text-center">Check Out</th>
		  <th class="text-center">Room Type</th>
		  <th class="text-center">Total Amount</th>
		  <!--th class="text-center">Balance Due</th-->
			
        </tr>
    </thead>
    <tbody>
        
<?php
$ir=0;
	$tsql = "select * from booking WHERE payment_status like 'pend%' AND checkin_date >= '".$rdate."' AND checkin_date <= '".$rdate2."'";
	$tre = mysqli_query($dbhandle,$tsql);
		if(mysqli_num_rows($tre) > 0){
			$ir++;
			while($row=mysqli_fetch_array($tre) )
			{	
				$q = mysqli_query($dbhandle, "SELECT roombook.totalroombook AS total, room.room_id AS rid, room.room_name AS name FROM roombook LEFT JOIN room ON roombook.room_id = room.room_id WHERE roombook.booking_id =".$row['booking_id'].";");

			echo"<tr class=\"text-center\">
				<td>".$row['booking_id']."</td>
				<td>".$row['first_name']." ".$row['last_name']."</td>
				<td>".$row['checkin_date']."</td>
				<td>".$row['checkout_date']."</td>
				<td width=13%>";
				while($r = mysqli_fetch_array($q))
				{
				   $rid = $r['rid'];
				   $rmtype = "".$r['total']." ".$r['name']."";
				   echo"".$rmtype." ";
				}

$re0 = mysqli_query($dbhandle,"select * from roombook WHERE booking_id=".$row['booking_id']." AND room_id=".$rid."");
if(mysqli_num_rows($re0) > 0){
			while($row0=mysqli_fetch_array($re0) )
			{
				if($row0['amt_paid']==null){$row0['amt_paid']=0;}
				$balance = $row['total_amount'] - $row0['amt_paid'];
			}}			

			echo"</td>
				<td>".$row['total_amount']."</td>
				<!--td>".$balance."</td-->
			</tr>";
		}	
				
		}
		if($ir==0) {echo "<h4>No Record Available</h4>";}
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

