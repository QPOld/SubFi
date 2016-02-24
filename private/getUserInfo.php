<?php
    /*
	SubFi - 2015
	Michael Parkinson
    */
    
    function getUserInfo($userName) {
	// This is the login information. This probably needs to be encrypted.
	$username = "loginUser";
	$password = "userLogin";
	$database = "userdata";
	
	// This is the connection to the database on the webserver. This will eventually be another
	// server that handles database queries.
	
	$con = mysqli_connect("localhost",$username,$password,$database) or die(header("Location:
	../php/loginPage.php"));
	$strSQL = 'SELECT * FROM userdata.accountinfo WHERE name="'.$userName.'"';
	$query = mysqli_query($con,$strSQL);
	
	//$userInfoArray = array();
	$userInfoArray = mysqli_fetch_row($query);
	//Create Array of Results.
	//while ($row = mysqli_fetch_array($query) ){
	//    $userInfoArray[] = $row;
	//}
	
	return $userInfoArray;
    }
?>
