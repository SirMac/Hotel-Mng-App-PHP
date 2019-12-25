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

$na0 = "menu__item";
$na1 = "menu__item";
$na2 = "menu__item";
$na3 = "menu__item";
$na4 = "menu__item active";
$rtitle = "Checked-Out Report";
require_once 'searchReport.php';

 if (isset($_POST['submit'])) {
 $rdate = $_POST["dreport"];
 $rdate2 = $_POST["dreport2"];
 if($rdate>$rdate2){echo"<script>alert(\"Start date Cannot be Greater Than End Date\");</script>";}
 else{
?>



<!-- =======================Departure Report==================-->
<div class="row">
<div class="col-lg-8 col-lg-offset-2" style="box-shadow: 0 5px 7px rgba(0, 0, 0, 0.3); margin-top: 10px">
<div class="table-responsive small" id="pending-booking">
<table class="table table-striped" id="pbTable" width="100%">
    <thead style="background-color: #e5e9e6;">
        <tr style="height: 30px; line-height: 30px">
          <th class="text-center">Client Name</th>
          <th class="text-center">Address</th>
		  <th class="text-center">Check In</th>
		  <th class="text-center">Check Out</th>
		  <th class="text-center">Room Type</th>
		  <th class="text-center">Room No.</th>
		  <th class="text-center">Amount</th>
		  <th class="text-center">Total Adults</th>
		  <th class="text-center">Total Children</th>
        </tr>
    </thead>
    <tbody>
        
<?php
$ir=0;
	$tsql = "select * from checkoutrecord WHERE checkedout_datetime >= '".$rdate."' AND checkedout_datetime <= '".$rdate2."'";
	$tre = mysqli_query($dbhandle,$tsql);
		if(mysqli_num_rows($tre) > 0){
			$ir++;
			while($row=mysqli_fetch_array($tre) )
			{	

			echo"<tr class=\"text-center\">
				<td>".$row['name']."</td>
				<td>".$row['address']."</td>
				<td>".$row['checkin_date']."</td>
				<td>".$row['checkout_date']."</td>
				<td>".$row['totalroombooked']."</td>
				<td>".$row['room_no']."</td>
				<td>".$row['total_amt']."</td>
				<td>".$row['total_adults']."</td>
				<td>".$row['total_children']."</td>
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

