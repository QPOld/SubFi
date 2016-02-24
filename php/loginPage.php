<!--
    SubFi - 2015
    Michael Parkinson
    This is the Existing User Login Page (EULP).
	If a user has an account all they need to do is enter their email address, account name
	(username), and password. This calls a private verification script.
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
	<link rel="stylesheet" type="text/css" href="../stylesheets/loginStyle.css" media="screen" />

    </head>
    
    <body>
	
	<form action='../html/index.html' method='post'>	
	    <div id="LogoText">
		<p> SubFi</p>

		<!--Again The HomeButton. Check loginStyle for #HomeButton. Takes the user back to
		the index.html page--!>
		<div id='HomeButton'>
		    <input type='submit'>
		</div>
	    </div>	
	</form>
	
	<div id="SubLogoText">
	    <p> Enter Account Information </p>
	</div>
	<div class="RegisterButton">
	    
	    <p> Need To Create An Account? </p>
	    
	    <form action="../php/registerPage.php" method="post">
		<p><input type="submit" value="Register" name='RegisterButton'></p>
	    </form>
	
	</div>

	<!--Email Address--!>
	<div id="SubSubLogoText">
	    <p> Email Address: </p>
	</div>
	<!--Account Name (username)--!>
	<div id="SubSubLogoText">
	    <p> Account Name:  </p>
	</div>
	<!--Password--!>
	<div id="SubSubLogoText">
	    <p> Password: </p>
	</div>

	<!--This div contains the entire login form. The login script loginAuth is private.--!>
	<div id="InputForms">
	    <form action='../private/loginAuth.php' method='post'>

		<p><input type='text' name='emailAddress'></p>
		<p><input type='text' name='userAccount'></p>
		<p><input type='password' name='userPassword'></p>
		<p><input type='submit' value='Login'></p>
	    
	    </form>
	</div>

	<!--This div below handles all error messages for the login process. For security the error
	message is given for all login failures.--!>
	<div id='LoginErrorText'>
	    <?php
		$checkLoginError = $_GET['loginFail'];
		if ($checkLoginError == 'true') {
		    echo '<p> Incorrect Login </p>';
		}
	    ?>
	</div>
	<div id='NewLoginText'>
	    <?php
		$checkNewLogin = $_GET['newUserReady'];
		if ($checkNewLogin == 'true') {
		    echo '<p> Go Ahead and Login </p>';
		}
	    ?>
	</div>
    </body>
</html>
