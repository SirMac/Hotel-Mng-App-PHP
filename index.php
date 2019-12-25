<?php
	$title = "Hotel Name";
	$nav1 = "menu__item menu__item--current";
	$nav2 = "menu__item";
	$nav3 = "menu__item";
	$nav4 = "menu__item";
 	include('header.php'); 
?>

		<!-- banner -->
	<div id="home" class="w3ls-banner">
		<!-- banner-text -->
		<div class="slider">
			<div class="callbacks_container">
				<ul class="rslides callbacks callbacks1" id="slider4">
					<li>
						<div class="w3layouts-banner-top">

							<div class="container">
								<div class="agileits-banner-info">
								<h4>HOTEL NAME</h4>
									<h3>We know what you love</h3>
										<p>Welcome to our hotel</p>
								</div>	
							</div>
						</div>
					</li>
					<li>
						<div class="w3layouts-banner-top w3layouts-banner-top1">
							<div class="container">
								<div class="agileits-banner-info">
								<h4>HOTEL NAME</h4>
									<h3>Stay with friends & families</h3>
										<p>Come & enjoy precious moment with us</p>
								</div>	
							</div>
						</div>
					</li>
					<li>
						<div class="w3layouts-banner-top w3layouts-banner-top2">
							<div class="container">
								<div class="agileits-banner-info">
								<h4>HOTEL NAME</h4>
								<h3>want luxurious vacation?</h3>
									<p>Get accommodation today</p>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
			<!--banner Slider starts Here-->
		</div>
		    <!--div class="thim-click-to-bottom">
				<a href="#about" class="scroll">
					<i class="fa fa-long-arrow-down" aria-hidden="true"></i>
				</a>
			</div-->
	</div>	
	<!-- //banner --> 
<!--//Header-->
<!-- //Modal1 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
						<!-- Modal1 -->
							<div class="modal-dialog">
							<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4>SUN  <span>RISE</span></h4>
										<img src="images/1.jpg" alt=" " class="img-responsive">
										<h5>We know what you love</h5>
										<p>Providing guests unique and enchanting views from their rooms with its exceptional amenities, makes Star Hotel one of bests in its kind.Try our food menu, awesome services and friendly staff while you are here.</p>
									</div>
								</div>
							</div>
						</div>

<!-- //Room Reservation -->
<div class="container-fluid">
<div class="row" id="availability-agileits_">
<div class="col-lg-4 book-form-left-w3layouts">
<div class="panel panel-default-">
    <div class="panel-heading" style="background-color:black; color: white">
        <h4 class="panel-title text-center">Book Room Now</h4>
    </div>
	<div class="panel-body">

          <form name="form" action="./reservation/checkroom.php" method="post" onSubmit="return validateForm(this);">
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
</div>
<!--div class="clearfix"> </div-->
 

<!-- banner-bottom -->
<div class="col-lg-8" style="margin-top: -60px;">
	<div class="banner-bottom">
		<div class="container-">	
			<div class="agileits_banner_bottom-">
				<h3><p>Experience a good stay, enjoy fantastic offers</p><p> Find our friendly welcoming reception</p></h3>
			</div>
			<div class="w3ls_banner_bottom_grids">
				<ul class="cbp-ig-grid">
					<li>
						<div class="w3_grid_effect">
							<span class="cbp-ig-icon w3_road"></span>
							<h4 class="cbp-ig-title">MASTER BEDROOM</h4>
							<span class="cbp-ig-category">Hotel</span>
						</div>
					</li>
					<!--li>
						<div class="w3_grid_effect">
							<span class="cbp-ig-icon w3_cube"></span>
							<h4 class="cbp-ig-title">SERENE BALCONY</h4>
							<span class="cbp-ig-category">Hotel</span>
						</div>
					</li-->
					<li>
						<div class="w3_grid_effect">
							<span class="cbp-ig-icon w3_users"></span>
							<h4 class="cbp-ig-title">LARGE CAFE</h4>
							<span class="cbp-ig-category">Hotel</span>
						</div>
					</li>
					<li>
						<div class="w3_grid_effect">
							<span class="cbp-ig-icon w3_ticket"></span>
							<h4 class="cbp-ig-title">WIFI COVERAGE</h4>
							<span class="cbp-ig-category">Hotel</span>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- //banner-bottom -->
</div>
</div>


<!--sevices-->
<div class="advantages">
	<div class="container">
		<div class="advantages-main">
				<h3 class="title-w3-agileits">Our Services</h3>
		   <div class="advantage-bottom">
			 <div class="col-md-6 advantage-grid left-w3ls wow bounceInLeft" data-wow-delay="0.3s">
			 	<div class="advantage-block ">
					<i class="fa fa-credit-card" aria-hidden="true"></i>
			 		<h4>Stay First, Pay After! </h4>
			 		<p>You Are Welcom.</p>
					<p><i class="fa fa-check" aria-hidden="true"></i>Decorated room, proper air conditioned</p>
					<p><i class="fa fa-check" aria-hidden="true"></i>Private balcony</p>
			 		
			 	</div>
			 </div>
			 <div class="col-md-6 advantage-grid right-w3ls wow zoomIn" data-wow-delay="0.3s">
			 	<div class="advantage-block">
					<i class="fa fa-clock-o" aria-hidden="true"></i>
			 		<h4>24 Hour Restaurant</h4>
			 		<p>You Are Welcom.</p>
					<p><i class="fa fa-check" aria-hidden="true"></i>24 hours room service</p>
					<p><i class="fa fa-check" aria-hidden="true"></i>24-hour Concierge service</p>
			 	</div>
			 </div>
			<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
<!--//sevices-->


  <!-- visitors -->
	<div class="w3l-visitors-agile" >
		<div class="container">
                 <h3 class="title-w3-agileits title-black-wthree">What other visitors experienced</h3> 
		</div>
		<div class="w3layouts_work_grids">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="w3layouts_work_grid_left">
								<img src="images/5.jpg" alt=" " class="img-responsive" />
								<!--div class="w3layouts_work_grid_left_pos">
									<img src="images/c10.jpg" alt=" " class="img-responsive" />
								</div-->
							</div>
							<div class="w3layouts_work_grid_right">
								<h4>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								Worth to come again
								</h4>
								<p>The Hotel is an excellent choice for anybody considering hosting their events there. </p>
								<h5>Client Name</h5>
								<p>Country</p>
							</div>
							<div class="clearfix"> </div>
						</li>
						<li>
							<div class="w3layouts_work_grid_left">
								<img src="images/5.jpg" alt=" " class="img-responsive" />
								<!--div class="w3layouts_work_grid_left_pos">
									<img src="images/c20.jpg" alt=" " class="img-responsive" />
								</div-->
							</div>
							<div class="w3layouts_work_grid_right">
								<h4>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								Worth to come again
								</h4>
								<p>Top level facilities and excellent staff make for a brilliant environment within which to operate. </p>
								<h5>Client Name</h5>
								<p>Country</p>
							</div>
							<div class="clearfix"> </div>
						</li>
						<li>
							<div class="w3layouts_work_grid_left">
								<img src="images/5.jpg" alt=" " class="img-responsive" />
								<!--div class="w3layouts_work_grid_left_pos">
									<img src="images/c30.jpg" alt=" " class="img-responsive" />
								</div-->
							</div>
							<div class="w3layouts_work_grid_right">
								<h4>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								Worth to come again
								</h4>
								<p>The hotel is meticulous in its planning, providing excellent décor, signage and the like. </p>
								<h5>Client Name</h5>
								<p>Country</p>
							</div>
							<div class="clearfix"> </div>
						</li>
						<li>
							<div class="w3layouts_work_grid_left">
								<img src="images/5.jpg" alt=" " class="img-responsive" />
								<!--div class="w3layouts_work_grid_left_pos">
									<img src="images/c40.jpg" alt=" " class="img-responsive" />
								</div-->
							</div>
							<div class="w3layouts_work_grid_right">
								<h4>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								Worth to come again
								</h4>
								<p>The hotel never seemed to tire of the constant email from an equally meticulous event manager. Always prompt and attentive.. </p>
								<h5>Client Name</h5>
								<p>Country</p>
							</div>
							<div class="clearfix"> </div>
						</li>
					</ul>
				</div>
			</section>
		</div>	
	</div>
  <!-- visitors -->



			<div class="copy">
		        <p>© 2019 Hotel . All Rights Reserved | Design by <a href="index.php">Mac</a> </p>
		    </div>
<!--/footer -->

<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	
<!-- Calendar -->
		<script src="js/jquery-ui.js"></script>
		<script>
				$(function() {
				$( "#checkin,#checkout" ).datepicker({ minDate: "+0D"});
				});
		</script>
<!-- //Calendar -->

<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- flexSlider -->
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
			<!-- //flexSlider -->
<script src="js/responsiveslides.min.js"></script>
			<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						  // Slideshow 4
						  $("#slider4").responsiveSlides({
							auto: true,
							pager:true,
							nav:false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
							  $('.events').append("<li>before event fired.</li>");
							},
							after: function () {
							  $('.events').append("<li>after event fired.</li>");
							}
						  });
					
						});
			</script>
		<!--search-bar-->
		<script src="js/main.js"></script>	
<!--//search-bar-->
<!--tabs-->
<script src="js/easy-responsive-tabs.js"></script>
<script>
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion           
width: 'auto', //auto or any width like 600px
fit: true,   // 100% fit in a container
closed: 'accordion', // Start closed if in accordion view
activate: function(event) { // Callback function if tab is switched
var $tab = $(this);
var $info = $('#tabInfo');
var $name = $('span', $info);
$name.text($tab.text());
$info.show();
}
});
$('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});
</script>
<!--//tabs-->
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	
	<div class="arr-w3ls">
	<a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	</div>
<!-- //smooth scrolling -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>

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


</body>
</html>


