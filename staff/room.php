<?php
session_start();
if($_SESSION['username']==null){
	//$_SESSION['msg'] = "Log in First";
    echo "Log in First";
	header("location: index.html");
}

$homepage = "Rooms";
$nav1 = "menu__item";
$nav2 = "menu__item menu__item--current";
$nav3 = "menu__item";
require_once "header.php";
require_once './auth.php';
?>

  <!--body-->


<div class="row" style="margin-top: 20px">
<div class="col-md-7">
<div class="panel panel-danger">
    <div class="panel-heading text-center">
        <h4 class="panel-title">Room Types</h4>
    </div>
        <div class="panel-body">
		    <div class="table-responsive small">
		        <table class="table">
		            <thead>
		                <tr>
		                  <th>Room Name</th>
		                  <th>Image</th>
		                  <th>Location</th>
					      <!--th>Occupancy</th-->
		                  <th>Rate (GHS)</th>
		                  <!--th>Description</th-->
		                  <th>Total Room</th>
		                  <th>Room Numbers</th>
		                </tr>
		            </thead>
		            <tbody>
		                

	<?php
	$tsql = "select * from room";
	$tre = mysqli_query($dbhandle,$tsql);
	if(mysqli_num_rows($tre) > 0){
			while($row=mysqli_fetch_array($tre) )
			{
				$res8 = mysqli_query($dbhandle, "select * from roomnumbers WHERE room_id='".$row['room_id']."'");
				if(mysqli_num_rows($res8) > 0){
				while ($row8 = mysqli_fetch_array($res8) ){
				$rmav = json_decode($row8['room_no'],true);

			$imgpath = "<img src=\"../".$row['imgpath']."\" style=\"height:50px;width:50px;\"\">\n";
			echo"<tr>
				<td>".$row['room_name']."</td>
				<td>".$imgpath."</td>
				<td>".$row['location']."</td>
				<!--td>".$row['occupancy']."</td-->
				<td>".$row['rate']."</td>
				<!--td>".$row['descriptions']."</td-->
				<td>".$row['total_room']."</td>";
				
			echo"	<td>";
						foreach ($rmav as $value) {
							echo $value,", ";
						}}}
			echo"</td>
				 </tr>";
		//}}	
			
	}}
			?>
		                
</tbody>
</table>		
</div>
</div>
</div> 
</div>



<!--=========================Rooms Available============================>
<div class="row"-->
<div class="col-md-5">
<div class="panel panel-danger">
    <div class="panel-heading text-center">
        <h4 class="panel-title">Rooms Available</h4>
    </div>
        <div class="panel-body">
		    <div class="table-responsive small" style="height: auto">
		        <table class="table" id="img">
		         <thead>
                <tr>
                  <th>Room Name</th>
                  <th class="text-center">Total Available</th>
			      <th>Unassign Rooms</th>
                </tr> 
              </thead>
		
		<?php
			$rsql = "select * from roomnumbers";
			$re0 = mysqli_query($dbhandle,$rsql);
			if(mysqli_num_rows($re0) > 0){
					while($row0=mysqli_fetch_array($re0) )
					{
						$rmname = $row0['room_name'];
						$rmfree = json_decode($row0['available_rm'],true);
						$totalrm = $row0['total_room'] - $row0['total_occupied'];
					
					echo"<tr>
						<td>".$rmname."</td>
						<td class=\"text-center\">".$totalrm."</td>
						<td>";
						foreach ($rmfree as $value) {
							echo $value,", ";
						}
					echo"	</td>
						</tr>";
				}		
			}
			?>
	</tbody>
</table>		
</div>
</div>
</div> 
</div>
</div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script-->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug >
    <script src="js/ie10-viewport-bug-workaround.js"></script-->
 

</body>
</html>