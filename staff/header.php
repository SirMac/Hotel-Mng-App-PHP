<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $homepage; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">
    <link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css"/> 
    <link rel="stylesheet" href="css/animation.css">
    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <!--script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script-->
 </head>
    
 <body class="mainbody">

    <!-- header -->
<div class="banner-top" style="margin-top: -60px; background-color: white">
        <div class="contact-bnr-w3-agile">
            <ul>
                <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">INFO@HOTEL.COM</a></li>
                <li><i class="glyphicon glyphicon-phone" aria-hidden="true"></i>+233 (233)000-00-00</li>   
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
        <h3><a class="navbar-brand" style="padding-top: 10px" href="dashboard.php">Hotel <span>Name</span><p class="logo_w3l_agile_caption">Your Dream Resort</p></a></h3>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
        <nav class="menu menu--iris">
            <ul class="nav navbar-nav menu__list">
                <li class="<?php echo $nav1; ?>"><a href="dashboard.php" class="menu__link">Home</a></li>
                <li class="<?php echo $nav2; ?>"><a href="room.php" class="menu__link">Rooms</a></li>
                <li class="<?php echo $nav3; ?>"><a href="./reports/arrivalReport.php" class="menu__link">Reports</a></li>
                <!--li class="menu__item"><a href="logout.php" class="menu__link scroll">Logout</a></li>
            </ul>
            <ul class="nav navbar-right navbar-top-links"-->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['username']; ?> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    </ul>
                </li>
            </ul><!-- /.navbar-top-links -->
        </nav>
    </div>
        </nav>

        </div>
    </div>
<!-- //header -->