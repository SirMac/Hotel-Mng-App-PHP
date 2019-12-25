<?php
//include('db.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title; ?></title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
<!--fonts->
<link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<--//fonts-->
</head>
<body>
<!-- header -->
<div class="banner-top">
			<div class="social-bnr-agileits">
				<ul class="social-icons3">
								<li><a href="https://www.facebook.com/" class="fa fa-facebook icon-border facebook"> </a></li>
								<li><a href="https://twitter.com/" class="fa fa-twitter icon-border twitter"> </a></li>
								<li><a href="https://linkedin.com" class="fa fa-linkedin icon-border googleplus"> </a></li> 
							</ul>
			</div>
			<div class="contact-bnr-w3-agile">
				<ul>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@hotel.com">INFO@HOTEL.COM</a></li>
					<li><i class="fa fa-phone" aria-hidden="true"></i>+233 (00)000-00-00</li>	
					<!--li class="s-bar">
						<div class="search">
							<input class="search_box" type="checkbox" id="search_box">
							<label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
							<div class="search_form">
								<form action="#" method="post">
									<input type="search" name="Search" placeholder=" " required=" " />
									<input type="submit" value="Search">
								</form>
							</div>
						</div>
					</li-->
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
<div class="w3_navigation">
<div class="container">
	<nav class="navbar navbar-default">
		<div class="navbar-header navbar-left">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<h1><a class="navbar-brand" href="index.php">Hotel <span>Name</span><p class="logo_w3l_agile_caption">Your Dream Resort</p></a></h1>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
			<nav class="menu menu--iris">
				<ul class="nav navbar-nav menu__list">
					<li class="<?php echo $nav1; ?>"><a href="index.php" class="menu__link">Home</a></li>
					<li class="<?php echo $nav2; ?>"><a href="about.php" class="menu__link">About</a></li>
					<li class="<?php echo $nav3; ?>"><a href="room.php" class="menu__link">Rooms</a></li>
					<li class="<?php echo $nav4; ?>"><a href="contact.php" class="menu__link">Contact Us</a></li>
				</ul>
			</nav>
		</div>
	</nav>

</div>
</div>
<!-- //header -->