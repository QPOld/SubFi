<!--
    SubFi - 2015
    Michael Parkinson

    The is the User Profile Page (UPP).
	This page contains all of the user information. This is where they can update and edit their
	information for the site. (locaiton info,payment, etc)

	Possible user customizations 
	    profile pics
	    forum options
	    user options
--!>
<!DOCTYPE html>
<html>

    <head>
	<meta charset='utf-8'>
	<meta name='description' content="Welcome to SubFi, a community based wifi communcation
	project rooted in San Francisco's SOMA district. This community project will contribute the
	technology and infrastructure to provide a seamless private wifi throughout San Francisco.">
	<meta name="keywords" content="SubFi,subfi wifi,subfi wifi app,subfi app,subfi phone
	app,subfi voip,subfi webserver, subfi iphone app">
	<meta name="author" content="SubFi">

	<title> Profile </title>
	<link rel='stylesheet' type='text/css' href='../stylesheets/profileStyle.css' media='screen' />
	<?php
	    // Start Session and check if user is still logged in.
            session_start();
	    $checkLogged = $_SESSION['logged'];//get logged
            
	    if (!$checkLogged) {
		//Not Logged In.
                header("Location:../php/loginPage.php");
                exit();
            }
	    
	    $_SESSION['logged'] = $checkLogged;//send logged
        ?>

    </head>
    <body>
	<p> SubFi </p>
    </body>
</html>

