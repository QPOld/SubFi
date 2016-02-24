<?php
    /*
	SubFi - 2015
	Michael Parkinson

	This is the New User Registration Script (NURS).
	    This is a private script that creates a new user account for the website. The email
	    address and the username must not exist in the database already.
	    
	    If the registration ie adding to the username table, works then an email is sent to the
	    provide address. This email contains a link to verify the account.
    */
    
    // the sendEmail.php file sends an email to the email address provided
    include('../private/scripts/sendEmail.php');
    
    //Database login -  This needs to be hidden.
    $username = "registerUser";
    $password = "userRegister";
    $database = "userdata";
    
    //Get all the data the user just entered on registrationPage.php
    $conUser = $_POST["userAccount"];
    $conPass = $_POST["userPassword"];
    $conPassTwo = $_POST["userPasswordCheck"];
    $conEmail = $_POST["emailAddress"];
    $conHuman = $_POST["isHuman"];
    
    // Error 1  - check if fields are empty
    if (empty($conUser) || empty($conPass) || empty($conPassTwo) || empty($conEmail)) {
	header("Location:../php/registerPage.php?emptyFail=true");
	exit();
    }
    
    //Error 2 - check if passwords match 
    if ($conPass != $conPassTwo) {
	header("Location:../php/registerPage.php?passFail=true");
	exit();
    }
    
    //Error 3 - check the checkbox
    if ($conHuman == "bot" ) {
	header("Location:../php/registerPage.php?humanFail=true");
	exit();
    }

    //connect to the user databse
    $con = mysqli_connect("localhost",$username,$password,$database) or die("Did Not
    Connect".mysqli_error($con));
    
    //Insert all of the require field into the database
    $strSQL = "INSERT userdata.accountinfo
    (`email`,`name`,`pass`,`verified`,`signup_date`,`Latitude`,`Longitude`) VALUES
    ('".$conEmail."','".$conUser."','".$conPass."','N','".date("Y-m-d")."','NULL','NULL')"; 
    
    //Check result - if true then the registration process is complete. The user is sent back to the
    //home page (index.html). The user can now log into the website.
    if (mysqli_query($con,$strSQL)) {
	//Success!
	header("Location: https://www.subfi.info/php/loginPage.php?newUserReady=true");
	exit();
    } else {
	//Failure!
	header("Location:../php/registerPage.php?nameEmailFail=true");
	exit();
    }
?>
