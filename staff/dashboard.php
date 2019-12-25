<?php 
session_start();
if($_SESSION['username']==null){
//	$_SESSION['msg'] = "Log in First";
    echo "Log in First";
	header("location: index.html");
}

$homepage = "Staff Dashboard";
$nav1 = "menu__item menu__item--current";
$nav2 = "menu__item";
$nav3 = "menu__item";
require_once "header.php";
?>


<!--Side Bar -->	
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3 sidebar">
        <?php require_once "sidebarContent.php" ?>	
  	</div>
      
<!--Side Bar -->


<!--Main Page -->
<div class="col-lg-9 main">
	<!--div class="container-fluid"-->
		<?php //include "searchBooking.php" ?>
		<?php require_once "newBookingDisplay.php" ?>


				<div class="row" id="bookindetails" style="display:none;">
					<hr>        <div class="col-xs-12 "  >
							  
							  <div class="table-responsive small">
								<table class="table table-striped">
								  <thead>
									<tr>
									  <th>Booking No.</th>
									  <th>Check In</th>
									  <th>Check Out</th>
									  <th>Room</th>
									  <th>Guests</th>
									  <th>Total Amount</th>
									  <th>Deposit</th>
									  <th>Balance</th>
									  <th>Payment Status</th>
									</tr>
								  </thead>
								  <tbody id="bookinginfo">
								 </tbody>
								</table>
							  </div>
							</div>
				</div>
			</div>
        </div>
 </div>
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster-->
     
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/datatables.min.js"></script>
	<!--<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
     IE10 viewport hack for Surface/desktop Windows 8 bug >
    <script src="js/ie10-viewport-bug-workaround.js"></script-->

  <!--script>
		new Morris.Line({
		  // ID of the element in which to draw the chart.
		  element: 'bookingstat',
		  // Chart data records -- each entry in this array corresponds to a point on
		  // the chart.
		  data: [
		  <?php/*
					include './auth.php';
					$re = mysqli_query($dbhandle, "select MONTH(booking_date) as month, YEAR(booking_date) as year, count(booking_date) as value from booking group by MONTH(booking_date);");

					if(mysqli_num_rows($re) > 0)
					{
						echo "{ month: '2014-09', value: 0},";
						echo "{ month: '2014-10', value: 0},";
						$count=0;
						while($row = mysqli_fetch_array($re))
						{
						echo "{ month: '".$row['year']."-".$row['month']."', value: ".$row['value']." },";
						}
						
					}*/
			?>
			
		  ],
		  // The name of the data record attribute that contains x-values.
		  xkey: 'month',
		  // A list of names of data record attributes that contain y-values.
		  ykeys: ['value'],
		  // Labels for the ykeys -- will be displayed when you hover over the
		  // chart.
		  labels: ['Value']
		});
  </script-->





</body></html>