
<div class="panel panel-default" style="margin: 0px -10px 0 -10px">
    <div class="panel-heading bg-black">
        <h4 class="panel-title text-center">Room Reservation</h4>
    </div>
	<div class="panel-body">

          <form name="form" action="../reservation/checkroom.php" method="post" onSubmit="return validateForm(this);">
			<div class="row">
				<div class="col-lg-4">
					<h5 class="fontcolor" for="checkin" style="margin-top: 7px">Check In*</h5>
				</div>
				<div class="col-lg-8">
					<div class="form-group">
						<input class="form-control" value="Click To Select Date" name="checkin" id="checkin"/>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-4">
					<h5 class="fontcolor" for="checkout" style="margin-top: 7px">Check Out*</h5>
				</div>
				<div class="col-lg-8">
					<div class="form-group">
						<input class="form-control" value="Click To Select Date" name="checkout" id="checkout"/>
					</div>
				</div>
			</div>
				<br>
	<div class="row">
		<div class="col-lg-6">
			<div class="row">
				<div class="col-lg-5">
					<h5 class="fontcolor" style="margin-top: 7px">Adults</h5>
				</div>
				<div class="col-lg-7">
					<div class="form-group">
						<select class="form-control"  name="totaladults" id="totaladults">
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						</select>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="row">
				<div class="col-lg-5">
					<h5 class="fontcolor" style="margin-top: 7px">Children</h5>
				</div>
				<div class="col-lg-7">
					<div class="form-group">
						<select class="form-control"  name="totalchildrens" id="totalchildrens">
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						</select>
					</div>
				</div>
			</div>
		</div>
</div>
<hr>
			<div class="row text-center">
			<button name="submit" class="btn btn-primary">Check Availability</button>
			</div>
</form>
</div>
</div>


<div class="row" style="margin-top: 50px;">	

<?php 
		include './auth.php';
	//	$re = mysqli_query($dbhandle, "select count(booking_id) as total_row from booking WHERE DATEDIFF(NOW(), booking_date) <= 7;");
		$re2 = mysqli_query($dbhandle, "select count(booking_id) as total_row from booking WHERE payment_status like 'pend%';");
		$re3 = mysqli_query($dbhandle, "select count(booking_id) as total_row from roombook WHERE room_no like ',%';");
		
		if(mysqli_num_rows($re2) > 0)
		{
			while($row2 = mysqli_fetch_array($re2))
			{
			?>
			<div class="col-lg-6 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div class="huge"><?php echo" ".$row2['total_row']." "?></div>
                                <div>Pending Bookings</div>
                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>

						<?php
						}
					}


					if(mysqli_num_rows($re3) > 0)
					{
						while($row3 = mysqli_fetch_array($re3))
						{
						?>
						<div class="col-lg-6 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <div class="huge"><?php echo" ".$row3['total_row']." "?></div>
                                            <div>Checked-In Records</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

						<?php
						}
					}

					?>
				</div>


<script src="js/jquery-2.2.4.min.js"></script>
<script>
	function validateForm(form) {
		var a = form.checkin.value;
		var b = form.checkout.value;
		var c = form.totaladults.value;
		var d = form.totalchildrens.value;

		if(a > b){
			alert("CheckIn date Cannot be Greater Than CheckOut Date");
			return false;
		}

		if(a == null || b == null || a == "Click To Select Date" || b == "Click To Select Date") 
			{
			 alert("Please choose date");
			 return false;
			}
			if(c == 0) 
			{
			 	if(d == 0) 
				{
				 alert("Please choose no. of guest");
				 return false;
				}
			}
			if(d == 0) 
			{
			 	if(c == 0) 
				{
				 alert("Please choose no. of guest");
				 return false;
				}
			}

	}
     
</script>

<script>
	  $(document).ready(function() {
			$("#checkout").datepicker({ minDate: "+0D"});
			$("#checkin").datepicker({ minDate: "+0D"});
			
		
	  });

</script>
