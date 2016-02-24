<!--
    SubFi - 2015
    Michael Parkinson

    This is the User Thank You Page.
	This page is shown to the user once the verification email link has been visited. This will
	look better in the future but for right now the page serves the purpose. The most that will
	change is the CSS.
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

	<title> Thank You </title>
    </head>
    <body>
	
	<p> Thank You! </p>
	
	<?php
	    $conUser = $_GET['username'];
	    session_start();
	    $_SESSION['username']  = $conUser;
	?>
	
	<form action='../private/verifyAccount.php' method="post">
	    <input type='submit' value='Click Here To Verify Account'>
	</form>
    </body>
</html>
