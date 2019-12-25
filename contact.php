<?php
	$title = "Contact Us";
	$nav1 = "menu__item";
	$nav2 = "menu__item";
	$nav3 = "menu__item";
	$nav4 = "menu__item menu__item--current";
 	require_once('header.php'); 
 	require_once './staff/auth.php';
?>


<!-- contact -->
<section class="contact-w3ls" id="contact">
	<div class="container">
		<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile2" data-aos="flip-left">
			<div class="contact-agileits">
<?php
	if(isset($_POST['sub']))
	{
		if($_POST['phone']==null){$phone="";}
		else{$phone = $_POST['phone'];}

		$name =$_POST['name'];
		$msg = $_POST['msg'];

		//$sql = "INSERT INTO `contact`(`fullname`, `phoneno`, `message`,`msg_date`) VALUES ('$name','$phone','$msg',now())" ;
		$sql = "INSERT INTO `contact`(`fullname`, `phoneno`, `message`) VALUES ('$name','$phone','$msg')" ;
		
		
		if(mysqli_query($dbhandle,$sql))
		echo"<h5 class='text-center' style='color:white'>Message Sent. Thank You!</h5><hr><br>";
		
	}
?>
				<h4>Contact Us</h4>
				<p class="contact-agile2">Send Us Your Enquires And Requests</p>
				<form  method="post" name="sentMessage" id="contactForm" >
					<div class="control-group form-group">
                        
                            <label class="contact-p1">Full Name*:</label>
                            <input type="text" class="form-control" name="name" id="name" required >
                            <p class="help-block"></p>
                       
                    </div>	
                    <div class="control-group form-group">
                        
                            <label class="contact-p1">Your Contact:</label>
                            <input type="tel" class="form-control" name="phone" id="phone">
							<p class="help-block"></p>
						
                    </div>
                    <div class="control-group form-group">
                        
                            <label class="contact-p1">Message*:</label>
                            <textarea class="form-control" rows="4" name="msg" id="msg" required ></textarea>
							<p class="help-block"></p>
						
                    </div>
                    
                    
                    <input type="submit" name="sub" value="Send Now" class="btn btn-primary">	
				</form>
				
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile1" data-aos="flip-right">
			<h4>Connect With Us</h4>
			<p class="contact-agile1"><strong>Phone :</strong>+233 (00)000-00-00</p>
			<p class="contact-agile1"><strong>Email :</strong> <a href="mailto:name@example.com">INFO@HOTEL.COM</a></p>
			<p class="contact-agile1"><strong>Address :</strong> Independence Avenue, Accra, Ghana</p>
																
			<div class="social-bnr-agileits footer-icons-agileinfo">
				<ul class="social-icons3">
								<li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
								<li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
								<li><a href="#" class="fa fa-linkedin-square icon-border- googleplus-" style='font-size:30px'> </a></li> 
								
							</ul>
			</div>
			<!--iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3074.7905052320443!2d-77.84987248482734!3d39.586871613613056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c9f6a80ccf0661%3A0x7210426c67abc40!2sVirginia+Welcome+Center%2FSafety+Rest+Area!5e0!3m2!1sen!2sin!4v1485760915662" ></iframe-->
		</div>
		<div class="clearfix"></div>
	</div>
</section>
<!-- /contact -->



<div class="copy">
        <p>© 2019 Hotel . All Rights Reserved | Design by <a href="#">Mac</a> </p>
</div>
<!--/footer -->


<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- contact form -->
<script src="js/jqBootstrapValidation.js"></script>

<!-- /contact form -->	
</body>
</html>