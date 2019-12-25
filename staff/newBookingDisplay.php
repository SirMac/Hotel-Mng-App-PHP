<?php 

require_once './auth.php';
$re2 = mysqli_query($dbhandle, "select count(booking_id) as total_row from booking WHERE payment_status like 'pend%';");
$row2 = mysqli_fetch_array($re2);

$re21 = mysqli_query($dbhandle, "select count(booking_id) as total_row from booking WHERE payment_status like 'exp%';");
$row21 = mysqli_fetch_array($re21);

$re3 = mysqli_query($dbhandle, "select count(booking_id) as total_row from roombook WHERE room_no like ',%';");
$row3 = mysqli_fetch_array($re3);

$row4 = mysqli_fetch_array(mysqli_query($dbhandle, "select count(id) as total_row from contact"));


date_default_timezone_set('UTC');
$today = date("Y-m-d");
$exp = mysqli_query($dbhandle,"select * from booking WHERE payment_status like 'pend%'");
	if(mysqli_num_rows($exp) > 0){
		while($expr=mysqli_fetch_array($exp) )
		{
			mysqli_query($dbhandle,"UPDATE booking SET payment_status='expired' WHERE checkout_date < '".$today."';");
			if(mysqli_error($dbhandle)){echo "Cannot Uppdate PaymentStatus in Booking Table";}
		}
	}
?>


<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <!--a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"-->
			<button class="btn btn-primary" id="pb1">
				 Pending Bookings  <span class="badge"><?php echo "".$row2['total_row']."" ?></span>
			</button>
			<button class="btn btn-danger" id="pb2">
				 Expired Bookings  <span class="badge"><?php echo "".$row21['total_row']."" ?></span>
			</button>
			<button class="btn btn-success" id="cr1">
				 Checked-In Records  <span class="badge"><?php echo "".$row3['total_row']."" ?></span>
			</button>
			<button class="btn btn-warning" id="msg1">
				 Client Messages  <span class="badge"><?php echo "".$row4['total_row']."" ?></span>
			</button>
			<!--/a-->
        </h4>
 </div>


<!--div id="collapseTwo" class="panel-collapse in"-->
    <div class="panel-body">

<!-- =======================Pending Bookings==================-->
	    <div class="table-responsive small" id="pending-booking">
	    <h5>Pending Bookings</h5>
	        <table class="display" id="pbTable" width="100%">
	            <thead>
	                <tr>
	                  <th>#</th>
	                  <th>First Name</th>
					  <th>Last Name</th>
					  <th>Check In</th>
					  <th>Check Out</th>
					  <th>Room Type</th>
					  <th>Status</th>
					  <th>Detail</th>
					  <th>Delete</th>
						
	                </tr>
	            </thead>
	            <tbody>
	                
<?php
$ir=0;
	$tsql = "select * from booking WHERE payment_status like 'pend%'";
	$tre = mysqli_query($dbhandle,$tsql);
		if(mysqli_num_rows($tre) > 0){
			while($row=mysqli_fetch_array($tre) )
			{	
				$q = mysqli_query($dbhandle, "SELECT roombook.totalroombook AS total, room.room_id AS rid, room.room_name AS name FROM roombook LEFT JOIN room ON roombook.room_id = room.room_id WHERE roombook.booking_id =".$row['booking_id'].";");
$ir++;
			echo"<tr>
				<td>".$row['booking_id']."</td>
				<td>".$row['first_name']."</td>
				<td>".$row['last_name']."</td>
				<td>".$row['checkin_date']."</td>
				<td>".$row['checkout_date']."</td>
				<td width=13%>";
				while($r = mysqli_fetch_array($q))
				{
				   $rid = $r['rid'];
				   $rmtype = "".$r['total']." ".$r['name']."";
				   echo"".$rmtype." ";
				}
			
			echo"</td>
				<td>".$row['payment_status']."</td>
				
				<td><a href='detail.php?booking=".$row['booking_id']."' class='btn btn-primary'>Action</a></td>
				<!--td class='text-center'><a id='delbooking".$ir."' class='glyphicon glyphicon-trash text-danger del' style='font-size:25px'></a></td-->

				<td class='text-center'><a onclick=\"javascript: return confirm('Are You Sure To Delete?');\" href='updatebooking.php?bid=".$row['booking_id']."&rid=".$rid."&frmid=3 ' class='glyphicon glyphicon-trash text-danger' style='font-size:25px'></a></td>
			</tr>";
		}	
				
		}
?>
 		                
</tbody>
</table>		
</div>


<!-- =======================Checkin Records==================-->

<div class="table-responsive small" id="checkin-records" style="display: none">
	<h5>Check-In Records</h5>
    <table class="display" id="crTable">
        <thead>
            <tr>
               <th>#</th>
              <th>First Name</th>
			  <th>Last Name</th>
			  <th>Check In</th>
			  <th>Check Out</th>
			  <th>Room Type</th>
			  <th>Room No.</th>
			  <th>Status</th>
			  <th>Action</th>
				
            </tr>
        </thead>
        <tbody>
		                

	<?php
	$tsql = "select * from booking WHERE payment_status like 'conf%'";
	$tre = mysqli_query($dbhandle,$tsql);
		if(mysqli_num_rows($tre) > 0){
			while($row=mysqli_fetch_array($tre) )
			{	
				$q = mysqli_query($dbhandle, "SELECT room_no, roombook.totalroombook AS total, room.room_name AS name, room.room_id AS rid FROM roombook LEFT JOIN room ON roombook.room_id = room.room_id WHERE roombook.booking_id =".$row['booking_id'].";");

				while($r = mysqli_fetch_array($q))
				{
				   $rmtype = "".$r['total']."  ".$r['name']."";		
					echo"<tr>
						<td>".$row['booking_id']."</td>
						<td>".$row['first_name']."</td>
						<td>".$row['last_name']."</td>
						<td>".$row['checkin_date']."</td>
						<td>".$row['checkout_date']."</td>
						<td>".$rmtype."</td>
						<td>".$r['room_no']."</td>
						<td>".$row['payment_status']."</td>
						
						<td><a href='b4checkOut.php?bid=".$row['booking_id']."&rid=".$r['rid']." ' class='btn btn-primary'>Detail</a>
						</td>
						</tr>";
				}	}
			
			}
			?>
                
        </tbody>
    </table>		
</div>


<!-- =======================Expired Bookings==================-->
	    <div class="table-responsive small" id="expired-booking" style="display: none;">
	    <h5>Expired Bookings</h5>
	        <table class="display" id="pbTable2" width="100%">
	            <thead>
	                <tr>
	                  <th>#</th>
	                  <th>First Name</th>
					  <th>Last Name</th>
					  <th>Check In</th>
					  <th>Check Out</th>
					  <th>Room Type</th>
					  <th>Status</th>
					  <th>Delete</th>
						
	                </tr>
	            </thead>
	            <tbody>
	                
<?php
$ir=0;
	$tsql = "select * from booking WHERE payment_status like 'exp%'";
	$tre = mysqli_query($dbhandle,$tsql);
		if(mysqli_num_rows($tre) > 0){
			while($row=mysqli_fetch_array($tre) )
			{	
				$q = mysqli_query($dbhandle, "SELECT roombook.totalroombook AS total, room.room_id AS rid, room.room_name AS name FROM roombook LEFT JOIN room ON roombook.room_id = room.room_id WHERE roombook.booking_id =".$row['booking_id'].";");
$ir++;
			echo"<tr>
				<td>".$row['booking_id']."</td>
				<td>".$row['first_name']."</td>
				<td>".$row['last_name']."</td>
				<td>".$row['checkin_date']."</td>
				<td>".$row['checkout_date']."</td>
				<td width=13%>";
				while($r = mysqli_fetch_array($q))
				{
				   $rid = $r['rid'];
				   $rmtype = "".$r['total']." ".$r['name']."";
				   echo"".$rmtype." ";
				}
			
			echo"</td>
				<td>".$row['payment_status']."</td>
				<td class='text-center'><a onclick=\"javascript: return confirm('Are You Sure To Delete?');\" href='updatebooking.php?bid=".$row['booking_id']."&rid=".$rid."&frmid=3 ' class='glyphicon glyphicon-trash text-danger' style='font-size:25px'></a></td>
			</tr>";
		}	
				
		}
?>
		                
</tbody>
</table>		
</div>



<!-- =======================Client Messages==================-->
	    <div class="table-responsive small" id="client-msg" style="display: none;">
	    <h5>Client Messages</h5>
	        <table class="display" id="msgTable" width="100%">
	            <thead>
	                <tr>
	                  <th>Client Name</th>
					  <th>Contact</th>
					  <th>Message</th>
					  <th>Message Date</th>
					  <th>Delete</th>
	                </tr>
	            </thead>
	            <tbody>
	                
<?php

	$qmsg = mysqli_query($dbhandle,"select * from contact");
		if(mysqli_num_rows($qmsg) > 0){
			while($rmsg=mysqli_fetch_array($qmsg) )
			{	
				$msg_date = new DateTime($rmsg['msg_date']);//->format("Y-m-d");
			echo"<tr>
				<td>".$rmsg['fullname']."</td>
				<td>".$rmsg['phoneno']."</td>
				<td>".$rmsg['message']."</td>
				<td>".$msg_date->format("Y-m-d H:m a")."</td>
				<td class='text-center'><a onclick=\"javascript: return confirm('Are You Sure To Delete?');\" href='updatebooking.php?msgid=".$rmsg['id']."&frmid=4 ' class='glyphicon glyphicon-trash text-danger' style='font-size:25px'></a></td>
			</tr>";
		}	
				
		}
?>
		                
</tbody>
</table>		
</div>

</div><!--Pannel Body  -->
</div> 
</div>
</div>


<!--============= Delete Booking ==============-->

<div id="delbook" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header sm-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title">Delete Booking</h6>
      </div>

    <div class="modal-body">
	<form action="updatebooking.php?frmid=<?php echo 3?>" method="post">
		<input type="hidden" name="bid" value='<?php echo $row['booking_id']; ?>'>

<div class="form-group">
		<h6>Reason For Deletion</h6>	
		<input type="text" class="form-control" required="required" name="reason" style="border-color: black">
		</div><br>
		<button type="submit" class="btn btn-danger">Delete</button>
	</form>
	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div> 



<script src="js/jquery-2.2.4.min.js"></script>
<script>
//====================Show Pending Records========================
$(document).ready(function(){
	$("#pb1").click(function(){
  	document.getElementById("checkin-records").style.display = "none";
    document.getElementById("pending-booking").style.display = "block";
    document.getElementById("expired-booking").style.display = "none";
    document.getElementById("client-msg").style.display = "none";
  });

    $('#pbTable').dataTable(
	{"dom":' <"search"f><"top"l>rt<"bottom"ip><"clear">'}
    );
});

//====================Show Checkin Records========================
$( document ).ready(function() {
  $("#cr1").click(function(){
  	document.getElementById("checkin-records").style.display = "block";
    document.getElementById("pending-booking").style.display = "none";
    document.getElementById("expired-booking").style.display = "none";
    document.getElementById("client-msg").style.display = "none";
  });

	$('#crTable').dataTable(
	{"dom":' <"search"f><"top"l>rt<"bottom"ip><"clear">'}
    );
});

//====================Show expired booking========================
$(document).ready(function(){
	$("#pb2").click(function(){
  	document.getElementById("checkin-records").style.display = "none";
    document.getElementById("pending-booking").style.display = "none";
    document.getElementById("expired-booking").style.display = "block";
    document.getElementById("client-msg").style.display = "none";
  });

    $('#pbTable2').dataTable(
	{"dom":' <"search"f><"top"l>rt<"bottom"ip><"clear">'}
    );
});

//====================Show Msg========================
$(document).ready(function(){
	$("#msg1").click(function(){
  	document.getElementById("checkin-records").style.display = "none";
    document.getElementById("pending-booking").style.display = "none";
    document.getElementById("expired-booking").style.display = "none";
    document.getElementById("client-msg").style.display = "block";
  });

    $('#msgTable').dataTable(
	{"dom":' <"search"f><"top"l>rt<"bottom"ip><"clear">'}
    );
});
</script>


<script type="text/javascript">
/*	var btn = document.querySelectorAll('.delentry');
	[].forEach.call(btn, function(el){
		el.onclick = function(){
		//	alert("Delete Booking");
			$('#delbook').modal('show');
		}
	})
	
	document.getElementById("delentry").onclick = function(e){
	$('#delbook').modal('show');
	swal("Error!", "Fill All The Fileds!", "error");
	//alert("Delete Booking");
	}*/
</script>