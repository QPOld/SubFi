<!--
    SubFi - 2015
    Michael Parkinson

    This is the Wifi Density Page.
	The page shows a picture generated every day of the number of wifi in the database.
	This may just turn into a admin thing.
	    possible every hour update.
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

	<title> Login </title>
	<link rel="stylesheet" type="text/css" href="../stylesheets/densityStyle.css" media="screen" />
	
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
    <form action='../php/menuPage.php' method='post'>	
	<div id="LogoText">
	    <p> SubFi</p>

	    <!--Again The HomeButton. Check loginStyle for #HomeButton. Takes the user back to the
	    menu.html page--!>
	    <div id='HomeButton'>
		    <input type='submit' name='HomeButton'>
	    </div>
	</div>	
    </form>
	
    <div id="SubLogoText">
	<p> Current Wifi Density </p>
    </div>

    <div id='SubSubLogoText'>
	<p> This image is </p>
	<p> updated everyday. </p>
    </div>

