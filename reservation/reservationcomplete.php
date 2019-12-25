<?php
session_start();
if(!isset($_SESSION['firstname'])){
	if(isset($_SESSION['username'])){
		header("location: ../staff/dashboard.php");
	}
	else{header("location: ../index.php");}
}

if(isset($_SESSION['username'])){
$homepage = "<a href=\"sessiondestroy.php?unset=3\" class=\"button round blackblur fontslabo\" ><i class=\"fa fa-home\" style=\"margin-left:-9px;\"></i></a>";
}
else{$homepage = "<a href=\"sessiondestroy.php?unset=31\" class=\"button round blackblur fontslabo\"><i class=\"fa fa-home\" style=\"margin-left:-9px;\"></i></a>";}

?>
		
<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reservation</title>
<link rel="stylesheet" href="scss/foundation.css">
<link rel="stylesheet" href="scss/style.css">
<link rel="stylesheet" href="scss/animation.css"><!--[if IE 7]><link rel="stylesheet" href="css/fontello-ie7.css"><![endif]-->
<link rel="stylesheet" href="scss/font-awesome.css">

</head>
<body class="fontbody" >
<div class="row foo" style="margin:30px auto 30px auto;" >
<div class="large-12 columns">
		<div class="large-3 columns centerdiv">
			<?php echo"$homepage";?>
			<p class="fontgrey blackblur">Home</p>
		</div>
		<div class="large-3 columns centerdiv">
			<a href="#" class="button round fontslabo" style="background-color:#2ecc71;"><i class="fa fa-check-square-o" style="margin-left:-9px;"></i></a>
			<p class="fontgrey blackblur">Reservation Complete</p>
		</div>
</div>

</div>
</div>
 
<div class="row">
	<div class="large-4 columns blackblur fontcolor" style="margin-left:-10px; padding:10px;">
	
		<div class="large-12 columns " >
		<p><b>Your Reservation</b></p><hr class="line">
				<form name="guestdetails" action="#" method="post" >
				<div class="row">
					<div class="large-12 columns">
						<div class="row">
						
							<div class="large-5 columns" style="max-width:100%;">
								<span class="fontgreysmall">Check In
								</span>
							</div>
							
							<div class="large-5 columns" style="max-width:100%;">
								<span class="">: <?php echo $_SESSION['checkin_date'];?>
								</span>				
							
							</div>
						</div>
						<div class="row">
							<div class="large-5 columns" style="max-width:100%;">
								<span class="fontgreysmall">Check Out
								</span>
							</div>
							
							<div class="large-5 columns" style="max-width:100%;">
								<span class="">: <?php echo $_SESSION['checkout_date'];?>
								</span>				
							
							</div>
						</div>
						<div class="row">
							<div class="large-5 columns" style="max-width:100%;">
								<span class="fontgreysmall">Adults
								</span>
							</div>
							
							<div class="large-5 columns" style="max-width:100%;">
								<span class="">: <?php echo $_SESSION['adults'];?>
								</span>				
							
							</div>
						</div>
						<div class="row">
							<div class="large-5 columns" style="max-width:100%;">
								<span class="fontgreysmall">Childrens
								</span>
							</div>
							
							<div class="large-5 columns" style="max-width:100%;">
								<span class="">: <?php echo $_SESSION['childrens'];?>
								</span>				
							
							</div>
						</div>
						<div class="row">
							<div class="large-5 columns" style="max-width:100%;">
								<span class="fontgreysmall" >Night Stay(s)
								</span>
							</div>
							
							<div class="large-5 columns" style="max-width:100%;">
								<span class="">: <?php echo $_SESSION['total_night'];?>
								</span>				
							
							</div>
						</div>
						<div class="row"><hr>
							<div class="large-6 columns" style="max-width:100%;">
								<span class="fontgreysmall" >Room Selected
								</span>
							</div>
							
							<div class="large-4 columns" style="max-width:100%;">
								<span class="fontgreysmall">Qty
								</span>				
							
							</div>
						</div>
						<div class="row">
							<div class="large-6 columns" style="max-width:100%;">
								<span class="" ><?php 
								
													foreach ($_SESSION['roomname'] as &$value0 ) {
													echo $value0;
													print "<br>";
													} ;

												?>
												
								</span>
							</div>
							
							<div class="large-4 columns" style="max-width:100%;">
								<span class="">
								<?php foreach ($_SESSION['roomqty'] as &$value1 ) {
													echo $value1;
													print "<br>";
													} ;
												
												?>
								</span>				
							
							</div>
						</div>
						
					</div>	
				</div><br>
				<div class="row">					
					<div class="large-12 columns" style="max-width:100%;">
						<p class="fontgrey borderstyle" style="text-align:center;">
						<!--span class="fontslabo " style="font-size:32px; text-align:center;">GHS <?php// echo $_SESSION['deposit'];?></span-->
						<span class="fontgrey" style="text-align:center;">Total Amount</span><br>
						<span class="fontslabo" style="font-size:32px; text-align:center;">GHS <?php echo $_SESSION['total_amount'];?></span></p>
						
					</div>
					
					<div class="large-12 columns" style="max-width:100%;">
						
						
					</div>
				</div>
				</form>
		</div>
	


	</div>
	<div class="large-8 columns blackblur fontcolor" style="padding:10px">
	
		<div class="large-12 columns" >
		<p><b>RESERVATION COMPLETE</b></p><hr class="line">
		<p>Details of your reservation have just been sent to you
		in a confirmation email. Please check your spam folder if you didn't received any email. We look forward to see you soon. In the
		meantime, if you have any questions, feel free to contact us.</p>
		<p>
		<i class="icon-phone" style="font-size:24px"></i> <span class="i-name fontgrey">Phone: </span><span class="fa fa-phone">&emsp; +233000000001</span><br>

        <i class="icon-mail-alt"style="font-size:24px"> </i> <span class="i-name fontgrey">Email: </span><span class="fa fa-envelope-o">&emsp; hotel@mail.com</span>
		</p><hr>
		<div class="row">
			<div class="large-12 columns" >
					<!--form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" >
					<input type="hidden" name="cmd" value="_xclick">
					<input type="hidden" name="business" value="mrzulkarnine@gmail.com">
					<input type="hidden" name="lc" value="MY">
					<input type="hidden" name="item_name" value="15% Hotel Deposit Payment">
					<input type="hidden" name="amount" value="<?php //$amount = $_SESSION['deposit']; print $amount; ?>">
					<input type="hidden" name="currency_code" value="MYR">
					<input type="hidden" name="button_subtype" value="services">
					<input type="hidden" name="no_note" value="0">
					<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
					<img type="image" src="img/paypal.jpg" style="background-color:white; width:32%; height:14%; padding:2px; " ></img>
					<br><button class="button small " border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" style="width:32%;background-color:#2ecc71; ">Pay Room Deposit Now</button>
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
					</form https://www.sandbox.paypal.com/cgi-bin/webscr>
					<form action="#" method="post" target="_top">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="3FWZ42DLC5BJ2">
					<input type="hidden" name="lc" value="MY">
					<input type="hidden" name="item_name" value="15% Hotel Deposit Payment for Booking ID #<?//echo $_SESSION['booking_id'];?>">
					<input type="hidden" name="amount" value="<?php// $amount = $_SESSION['deposit']; print $amount; ?>">
					<input type="hidden" name="currency_code" value="GHS">
					<input type="hidden" name="button_subtype" value="services">
					<input type="hidden" name="no_note" value="0">
					<input type="hidden" name="custom" value="<?// echo $_SESSION['booking_id'];?>">
					<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
					<img type="image" src="img/paypal.jpg" style="background-color:white; width:32%; height:14%; padding:2px; " ></img>
					<br><button class="button small " border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" style="width:32%;background-color:#2ecc71; ">Pay Room Deposit Now</button-->
					</form>


			</div>
		</div>
		</div>
	


	</div>


</div>

<script>
</script>
</body></html>