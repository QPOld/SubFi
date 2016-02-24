<?php
    /*
	SubFi - 2015
	Michael Parkinson

	This will handle the iphone app login with the database server.
    */
    //
    // This will be called on the post request.
    //
    // Check the result of the query.
    $queryCheck = 0;

    if ($_SERVER['HTTP_METHOD'] === 'postValues') {

	$appEmailAdd = $_POST['email'];
	$appUserName = $_POST['username'];
	$appUserPass = $_POST['password'];
    
	// This is the login information. This probably needs to be encrypted.
	$username = "loginUser";
	$password = "userLogin";
	$database = "userdata";
    
	// This is the connection to the database on the webserver. This will eventually be another
	// server that handles database queries.
	$con = mysqli_connect("localhost",$username,$password,$database) or die(header("Location:
	../php/loginPage.php"));
    
	//MySQL Query String. Return 1 if login is correct.
	$strSQL = 'SELECT DISTINCT 1 FROM userdata.accountinfo WHERE name="'.$conUser.'" AND
	pass="'.$conPass.'" AND email="'.$conEmail.'"';
	$query = mysqli_query($con,$strSQL);
    
	//Look at the results of the query.
	while($result = mysqli_fetch_array($query)) {
	
	    $queryCheck = 1; //user is found
	}

	echo $queryCheck;

    } else {
	echo $queryCheck;
    }


?>
