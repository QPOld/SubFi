<?php
	$username = "updateUser";
        $password = "userUpdate";
        $database = "userdata";
        $con = mysqli_connect("localhost",$username,$password,$database) or die("Did Not Connect".mysqli_error($con));
	
	session_start();
	$conUser = $_SESSION['username'];
	
	$strSQL = 'UPDATE userdata.accountinfo SET verified="Y" WHERE name="'.$conUser.'"';
	$query = mysqli_query($con,$strSQL);
	
	header("Location:../php/loginPage.php");
	mysqli_close($con);
	exit();
?>
