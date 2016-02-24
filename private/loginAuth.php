<?php
    /*
	SubFi - 2015
	Michael Parkinson

	This is the Private User Login Script (PULS); 
	    
	    Called in loginPage.php

	    This script connects to the username database with a predefined user that can only check
	    login variables against the database. Since each email and username (account name) are
	    unique it provides a nice way to check if someone has a correct login.
    */
    
    // Start a session to pass sensitive information to next pages.
    session_start();
    ini_set('session.cache_limiter','public');
    session_cache_limiter(false);
    // This is the login information. This probably needs to be encrypted.
    $username = loginUser;
    $password = userLogin;
    $database = userdata ;
   
    // This is the connection to the database on the webserver. This will eventually be another
    // server that handles database queries.
    $con = mysqli_connect("localhost",$username,$password,$database) or die(header("Location:
    ../html/index.html"));
    
    //Get the login information from the input fields on loginPage.php

    $conUser = $_POST["userAccount"];
    $conPass = $_POST["userPassword"];
    $conEmail = $_POST["emailAddress"];
    
    //MySQL Query String. Return 1 if login is correct.
    $strSQL = 'SELECT DISTINCT 1 FROM userdata.accountinfo WHERE name="'.$conUser.'" AND
    pass="'.$conPass.'" AND email="'.$conEmail.'"';
    $query = mysqli_query($con,$strSQL);
    
    // Check the result of the query.
    $queryCheck = 0;
    $veri = 'N'; // initialize to not found
    $_SESSION['verified'] = $veri; // this is for #VerificationEmailButton
    
    //Look at the results of the query.
    while($result = mysqli_fetch_array($query)) {
	
	$queryCheck = 1; //user is found
	$verifySQL = 'SELECT verified FROM userdata.accountinfo WHERE name="'.$conUser.'"';
	$verifyQuery = mysqli_query($con,$verifySQL);//check if user is verified.
	$_SESSION['verified'] =  mysqli_fetch_array($verifyQuery)[0];
    }
    
    //Now that we know if the user exist or does not exist change the page.
    if ($queryCheck == 0) {
	//User not Found
	mysqli_close($con); // close the connection when done.
	header("Location:../html/index.html");
	exit();
    
    } else {
	//User Found->Pass Along User Info
	$_SESSION['username']  = $conUser;
	$_SESSION['useremail'] = $conEmail;
	$_SESSION['logged'] = TRUE;
	
	mysqli_close($con); // close the connection when done.
	header("Location:../php/menuPage.php");
	exit();
    }
?>
