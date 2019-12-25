<nav class="navbar navbar-inverse" style=" border-radius: 0;">
  <div class="container-fluid">
     <ul class="nav navbar-nav">
        <li class="<?php echo $na0; ?>"><a href='arrivalReport.php' id='dpreport'>Arrival Report</a></li>
        <li class="<?php echo $na1; ?>"><a href='departureReport.php' id='dpreport'>Departure Report</a></li>
        <li class="<?php echo $na2; ?>"><a href='bookingReport.php' id='breport'>Booking Report</a></li>
        <li class="<?php echo $na3; ?>"><a href='transactionReport.php' id='treport'>Transaction Report</a></li>
        <li class="<?php echo $na4; ?>"><a href='checkedoutReport.php' id='areport'>Checked-Out Report</a></li>
    </ul>

    </div>
</nav>

<div class="container-fluid"> 
<div class="row" style="padding-top: 5px">
    <div class="col-lg-8 col-lg-offset-2 bg-mc">
        <h4 class="panel-title2 text-center"><?php echo $rtitle; ?></h4>
    </div>
</div>
    <!--div class="panel-body"-->

<div class="row">
<div class="col-lg-8 col-lg-offset-2" style="padding-top:20px; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.5)"> 
<form action="" method="post">
    <div class="row">
    <div class="col-lg-2 text-right">
        <h5 class="fontcolor" style="margin-top: 7px">Date (From):*</h5>
    </div>
    <div class="col-lg-4">
        <div class="form-group inner-addon left-addon">
             <i class="glyphicon glyphicon-calendar" style="position: absolute; padding: 10px;"></i>
            <input class="form-control" required="required" autocomplete="off" value="<?php echo isset($_POST['dreport']) ? $_POST['dreport'] : '' ?>" name="dreport" id="dreport"/>
        </div>
    </div>

    <div class="col-lg-2 text-right">
        <h5 class="fontcolor" style="margin-top: 7px">Date (To):*</h5>
    </div>
    <div class="col-lg-4">
        <div class="form-group inner-addon left-addon">
            <i class="glyphicon glyphicon-calendar" style="position: absolute; padding: 10px"></i>
            <input class="form-control" required="required" autocomplete="off" value="<?php echo isset($_POST['dreport2']) ? $_POST['dreport2'] : '' ?>" name="dreport2" id="dreport2"/>
        </div>
    </div>
</div>

    <div class="row">
    <div class="col-lg-12 text-right" style="margin-bottom: 10px; margin-top: 10px">
         <button type="submit" name="submit" id="submit" class="btn btn-primary">Get Report</button>
    </div>
</div>
</form>
</div>
</div>

<?php 
 //if (isset($_POST['submit'])) {
 //$rdate = $_POST["dreport"];
 //$rdate2 = $_POST["dreport2"];

?>
