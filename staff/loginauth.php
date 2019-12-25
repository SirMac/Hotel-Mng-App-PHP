<?php
session_start();
require_once "auth.php";
 
if(isset($_POST['username'])){

//	$type = $_POST['utype'];
	$name = mysqli_real_escape_string($dbhandle, $_POST['username']);
	$pass = mysqli_real_escape_string($dbhandle, $_POST['password']);
	//$pass = md5($pass1); //Encrypt Password

//===========Validating Form Inputs=================
	$errorPass = false;
	$errorEmail = false;
//	$errorEmpty = false;

	if(empty("$name") || empty("$pass")){
		if(empty("$name") && empty("$pass")){
			echo "<span class='text-white'>Fill All Fields</span>";
			$errorEmail = true;
			$errorPass = true;
		}
		else{
			if(empty("$name")){
				echo "<span class='text-white'>Email Field Empty</span>";
				$errorEmail = true;
			}
			if(empty("$pass")){
				echo "<span class='text-white'>Password Field Empty</span>";
				$errorPass = true;
			}
		}
	}

//==============Validation Success=================
else{

//	if($type == "customer") {
	$res = mysqli_query($dbhandle,"select * from user where  username='".$name."' and  password='".$pass."'");	
	//$row = mysqli_fetch_array($res);
	//$uname = $row['id'];
	//$cname = $row['name'];

	if(mysqli_num_rows($res)>0)
	{	
	   	$_SESSION['username'] = $name;
	//	$_SESSION['password'] =  $pass;
	// 	$_SESSION['success'] = "You have successfully Logged-In";
	//	header("location: dashboard.php");
	//	echo "<meta http-equiv='refresh' content='0;URL= dashboard.php'>";
		echo "<meta http-equiv=\"refresh\" content=\"0;URL= dashboard.php\">";
	//	header('Refresh: 0;url=dashboard.php');
		exit();	
	}

	else
	  {
	    echo "<span class='text-white'> Email Or Password Not Correct. Try Again! </span>";
		exit();
	  }
}
}

	else
	  {
	    echo "<span class='text-white'>Login Failled. Contact the Administrator </span>";
		exit();
	  }

/*
$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] =  $_POST['password'];

include './auth.php';
$re = mysqli_query($dbhandle,"select * from user where username = '".$_SESSION['username']."'  AND password = '".$_SESSION['password']."' " );
echo mysqli_error($dbhandle);
if(mysqli_num_rows($re) > 0)
{
header('Refresh: 0;url=dashboard.php');
} 
else
{

session_destroy();
header("location: index.htm");
}
*/
?>
<script src="js/jquery-2.2.4.min.js"></script>
<script>
	var email = document.getElementById("fname");
	var pass = document.getElementById("fpass");

	var errorEmail = "<?php echo "$errorEmail"; ?>";
	var errorPass = "<?php echo "$errorPass"; ?>";

	if(errorEmail==true){email.classList.add("inputerror");}
	else{email.classList.add("inputok");}

	if(errorPass==true){pass.classList.add("inputerror");}
	else{pass.classList.add("inputok");}
</script>
