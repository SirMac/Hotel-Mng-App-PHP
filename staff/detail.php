<?php
session_start();
if($_SESSION['username']==null){
	//$_SESSION['msg'] = "Log in First";
    echo "Log in First";
	header("location: index.html");
}

require_once './auth.php';
$res2 = mysqli_query($dbhandle, "Select * from booking where booking_id=".$_GET['booking']."");
if( mysqli_num_rows($res2) >0){
	while ($row = mysqli_fetch_array($res2)){
		$chkin = $row['checkin_date'];

$homepage = "Staff Dashboard";
$nav1 = "menu__item";
$nav2 = "menu__item";
$nav3 = "menu__item";
require_once "header.php";
?>



<!--Side Bar -->	
<div class="container-fluid">
 <div class="panel panel-default" style="margin-top: 10px;">
    <div class="panel-heading">
    	<div class="row">
    	<div class="col-lg-3">
  		<button type="button" class="btn btn-primary" id="editbook">Edit Booking</button>
  		</div>
		<div class="col-lg-6 text-center">
        <h4 class="panel-title ">Reservation Details of <?php echo $row['first_name']; ?></h4>
    	</div>
		<div class="col-lg-3 text-right">
  		<button type="button" class="btn btn-success" id="checkin">Check-In Customer</button>
  		</div>
    </div>
</div>
	<div class="panel-body">
		<div class="row">
		<div class="col-lg-4 main">
		<div class="panel">
		    <div class="panel-heading bg-black">
		        <h4 class="panel-title">Customer Details</h4>
		    </div>
			<div class="panel-body">
			    <div class="table-responsive small" style="height: auto;">
			        <table class="table">
			          
			<tbody>
			<?php
				echo"<tr><th>First Name:</th>
					<td>".$row['first_name']."</td></tr>
					<tr><th>Last Name:</th>
					<td>".$row['last_name']."</td></tr>
					<tr><th>Email:</th>
					<td>".$row['email']."</td></tr>
					<tr><th>Tel. Number:</th>
					<td>".$row['telephone_no']."</td></tr>
					<tr><th>Address</th>
					<td>".$row['add_line1']."</td></tr>
					<tr><th>Country</th>
					<td>".$row['country']."</td></tr>
					";
				
			?>
		</tbody>
		</table>		
		</div>
		</div>
		</div> 
		</div>


		<div class="col-lg-4 main">
		<div class="panel">
		    <div class="panel-heading bg-black">
		        <h4 class="panel-title">Booking Details</h4>
		    </div>
			<div class="panel-body">
			    <div class="table-responsive small" style="height: auto;">
			        <table class="table">
			          
			<tbody>
			<?php
			$q = mysqli_query($dbhandle, "SELECT roombook.totalroombook AS total, room.room_name AS name FROM roombook LEFT JOIN room ON roombook.room_id = room.room_id WHERE roombook.booking_id =".$row['booking_id'].";");
				if( mysqli_num_rows($q) >0){
					/*while($r = mysqli_fetch_array($q))
					{
					   $rmtype = "".$r['total']."  ".$r['name']."";
					}*/
				}
				else{$rmtype=0;}
				echo"<tr><th>Booking ID:</th>
					<td>".$row['booking_id']."</td></tr>
					<tr><th>Room Type:</th>
					<td>";
				while($r = mysqli_fetch_array($q))
					{
					   $rmtype = "".$r['total']."  ".$r['name']."";	
					   echo"".$rmtype.", ";
					}
				echo"</td></tr>
					<tr><th>Check-In Date:</th>
					<td>".$row['checkin_date']."</td></tr>
					<tr><th>Check-Out Date:</th>
					<td>".$row['checkout_date']."</td></tr>
					<tr><th>Total Adults:</th>
					<td>".$row['total_adult']."</td></tr>
					<tr><th>Total Children</th>
					<td>".$row['total_children']."</td></tr>
					";
			?>
		</tbody>
		</table>		
		</div>
		</div>
		</div> 
		</div>



		<div class="col-lg-4 main">
		<div class="panel">
		    <div class="panel-heading bg-black">
		        <h4 class="panel-title">Payment Details</h4>
		    </div>
			<div class="panel-body">
			    <div class="table-responsive small" style="height: auto;">
			        <table class="table">
			          
			<tbody>
			<?php
				$balance = $row['total_amount'] - $row['deposit'];
				echo"<tr><th>Payment Status:</th>
					<td>".$row['payment_status']."</td></tr>
					<tr><th>Total Amount:</th>
					<td>".$row['total_amount']."</td></tr>
					<tr><th>Deposit:</th>
					<td>".$row['deposit']."</td></tr>
					<tr><th>Balance:</th>
					<td>".$balance."</td></tr>
					";
				}}
			?>
		</tbody>
		</table>		
		</div>
		</div>
		</div> 
		</div>
	</div>
  </div>
</div>


<!-- ===============Edit Customer Details=============== -->
<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-default">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title">Edit Customer Detail</h6>
      </div>
      <div class="modal-body">

<!--div class="col-lg-5 main editbooking" id="try1"-->
	 <form  role="form" action="updatebooking.php?frmid=1" method="post">
		 <div class="form-group form-group-sm">
			<?php
			include './auth.php';
			$id = $_GET['booking'];
			$r = mysqli_query($dbhandle, "select * from booking where booking_id=".$id."");
			if(mysqli_num_rows($r)>0){
				while($rows = mysqli_fetch_array($r))
				{

print "<input type=\"hidden\" name=\"bookingid\" id=\"bookingid\" value=\"".$id."\">

	<div class=\"row\">
	   <div class=\"col-md-3\"><h6>First Name:</h6></div>
	   <div class=\"col-md-9\">	
	   <input style=\"margin-top:-7px;\" type=\"text\" class=\"form-control\" name=\"firstname\" id=\"firstname\" value=\"".$rows['first_name']."\">
	   </div></div>

	<div class=\"row\">
	   <div class=\"col-md-3\"><h6>Last Name:</h6></div>
	   <div class=\"col-md-9\">
	<input style=\"margin-top:-7px;\" type=\"text\" class=\"form-control\" name=\"lastname\" id=\"lastname\" value=\"".$rows['last_name']."\">
		</div></div>

	<div class=\"row\">
	   <div class=\"col-md-3\"><h6>Email:</h6></div>
	   <div class=\"col-md-9\">
	<input style=\"margin-top:-7px;\" type=\"text\" class=\"form-control\" name=\"email\" id=\"email\" value=\"".$rows['email']."\">
	</div></div>

	<div class=\"row\">
	   <div class=\"col-md-3\"><h6>Telephone:</h6></div>
	   <div class=\"col-md-9\">
	<input style=\"margin-top:-7px;\" type=\"text\" class=\"form-control\" name=\"telephone\" id=\"telephone\" value=\"".$rows['telephone_no']."\">
	</div></div>

	<div class=\"row\">
	   <div class=\"col-md-3\"><h6>Check-In Date:</h6></div>
	   <div class=\"col-md-9\">
	<input style=\"margin-top:-7px;\" type=\"text\" class=\"form-control\" name=\"checkin\" id=\"checkin\" value=\"".$rows['checkin_date']."\">
	</div></div>

	<div class=\"row\">
	   <div class=\"col-md-3\"><h6>Check-Out Date:</h6></div>
	   <div class=\"col-md-9\">
	<input style=\"margin-top:-7px;\" type=\"text\" class=\"form-control\" name=\"checkout\" id=\"checkout\" value=\"".$rows['checkout_date']."\">
	</div></div>

	";
	}						
}
			
			?>	
					

  	</div>
  	<div class="row">
  	<div class="col-lg-12 text-center">
	<button type="submit" class="btn btn-success" style="width: 150px; ">Update</button>
	</div></div>
	</form>
</div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>




<!-- ===============Check In Customer=============== -->
<?php
include './auth.php';
$id = $_GET['booking'];
$k=0;
?>

<div id="checkinModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-default">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title">Check-In Customer</h6>
        <h6 class="modal-title">Assign Room Numbers To Rooms</h6>
      </div>
      <div class="modal-body">
	 
<?php
date_default_timezone_set('UTC');

//===============Only checkin if checkin date is today=================
if($chkin==date('Y-m-d')){
	echo "<form  role=\"form\" action=\"updatebooking.php?frmid=2\" method=\"post\">";

$res2 =  mysqli_query($dbhandle,"select * from roombook where booking_id=".$id."");
	if(mysqli_num_rows($res2) > 0){
		while ($row1 = mysqli_fetch_array($res2) ){
$res3 = mysqli_query($dbhandle, "select * from roomnumbers where room_id=".$row1['room_id']."");
	if(mysqli_num_rows($res3) > 0){
		while ($row2 = mysqli_fetch_array($res3) ){
		//	$a = json_decode($row2['room_no'],true);
			$a = json_decode($row2['available_rm'],true);

		$k++;
 
		if($a==""){echo "<br>No Room Available For ".$row2['room_name']." Suite","<br><br>";}
	else{
print "<div class=\"form-group\">
	   <div class=\"text-center\"><h6>".$row2['room_name']." Suite</h6></div>\n<hr>";
print "<input type=\"hidden\" name=\"bookingid\" id=\"bookingid\" value=\"".$id."\">
	   <input type=\"hidden\" name=\"roomid".$k."\" id=\"roomid\" value=\"".$row1['room_id']."\">
	   <input type=\"hidden\" name=\"loopcount\" id=\"loopcount\" value=\"".$k."\">
	   <input type=\"hidden\" name=\"paymentstatus\" id=\"paymentstatus\" value=\"confirmed\">
	   </div>\n";


for($b=1; $b<$row1['totalroombook']+1; $b++){

echo"<div class=\"form-group form-group-sm\">
	<div class=\"row\">
	   <div class=\"col-md-5\" style=\"margin-top:7px\"><h6>Assign Room: ".$b."</h6></div>
	   <div class=\"col-md-7\">
    <select name=\"room_no".$k."".$b."\" class=\"form-control\" required=\"required\" id=\"room_no\" >
    <option value=\"\">Select</option>";


	for($i=1; $i<count($a)+1; $i++){
		echo"<option value=\"".$a[$i]."\">".$a[$i]."</option>";
	}

echo"
    </select>
    </div></div></div>
	<input type=\"hidden\" name=\"loopcount2\" id=\"loopcount2\" value=\"".$b."\">
    <br>";
}
}
}}
}}
	echo"<button type=\"submit\" class=\"btn btn-success\">Check In</button>
		</form>";
}
else{echo"<span class=\"text-center\"><p><b>Cannot CheckIn Now</b></p>
		<p>CheckIn Date Not Today</p>
		<p>If You Must Checkin Today, Use Edit Boking to edit CheckIn-Date</p></span>";}

?>	
 <!--/div-->
	

</div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster>
    <script src="js/jquery.min.js"></script-->
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug >
    <script src="js/ie10-viewport-bug-workaround.js"></script-->
  <script>

	document.getElementById("checkin").onclick = function(e){
	$('#checkinModal').modal('show');
	}

	document.getElementById("editbook").onclick = function(e){
	$('#editModal').modal('show');
	}

  </script>

<!--div id="global-zeroclipboard-html-bridge" class="global-zeroclipboard-container" title="" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;" data-original-title="Copy to clipboard">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" width="100%" height="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1416326489703">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">         <embed src="/assets/flash/ZeroClipboard.swf?noCache=1416326489703" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="100%" height="100%" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com" scale="exactfit">                </object></div><svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200" preserveAspectRatio="none" style="visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs></defs><text x="0" y="10" style="font-weight:bold;font-size:10pt;font-family:Arial, Helvetica, Open Sans, sans-serif;dominant-baseline:middle">200x200</text></svg-->

</body>
</html>