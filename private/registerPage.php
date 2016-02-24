<!--
    SubFi - 2015
    Michael Parkinson

    This is the New User Registration Page (NURP).
	Creating an account requires a valid and unused email, an unused username, and a password.
	The requirement that it must be unused is such that the database remains unique.

	There is a clickable box on the page. Its a cheap attempt at security.
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

	<title> Register </title>
	<link rel="stylesheet" type="text/css" href="../stylesheets/registerStyle.css" >
    
    </head>
    <body>
		
	<form action='../html/index.html' method='post'>
	    <div id="LogoText">
		<p> SubFi </p>
		<!--A simple submit button that takes you to the index.html page. The button is
		hidden check the registerStyle.css for #HomeButton --!>
		<div id='HomeButton'>
		    <input type=submit>
		</div>
	    </div>
	</form>
		
	<div id="SubLogoText">
	    <p> Account Creation </p>
	</div>
	<!--The users email address. The field must be filled and must not already exist
		in the database. --!>
	<div id="SubSubLogoText">
	    <p> Email Address </p>
        </div>
	<!--The user name can be anything but ''. The only requirement is that it doesn't
	already exist in the user database.--!>
	<div id="SubSubLogoText">
	    <p> Account Name </p>
        </div>
	<!--The password has two field. This is for secrutity as well as a way for the user
	to rememeber their password. There are two checkboxes. One is hidden and the other
	is visible. User has to click it. to proceed.--!>
	<div id="SubSubLogoText">
            <p> Password </p>
        </div>
	<!--A simply checkbox to make sure the user is a human and not a bot trying to attack the
	website. One checkbox is visible and the other is not--!>	
	<div id='SubSubLogoText'>
	    <p> Are you Human? </p>
	</div>
	<div id="InputForms">
	    <!--SubSubLogoText is the general non title font. Check the registerStyle.css file for
	    #SubSubLogoText. This is used in every file with html text.--!>
	    <form action='../private/registerAuth.php' method='post'>
		
		<p> <input type='text' name='emailAddress'> </p>

		<p> <input type='text' name='userAccount'> </p>
                
		<p>
		    <input type='password' name='userPassword'>
		    <input type='password' name='userPasswordCheck' placeholder='Re-Enter Password'>
		</p>
		<p>
		    <input type='hidden' name='isHuman' value='bot'/>
		    <input type='checkbox' name='isHuman' value='human'>
		</p>
                
		<!--Click to validate entrys and attempt to register the account.--!>
		<p> <input type='submit' value='Register'> </p>
	    </form>
	    
	    
	</div>

	<!--These div below are for error messages related to the registration process. If something
	isn't correct with the registration then an error message will appear. All of the errors are
	given with POST/GET. This provides an simple way for error handling and debug.--!>

	<div id='ErrorText'>
	<div id='EmailNameErrorText'>
	    <!--The username and email are combined such that the combination of the
	    username-email will be unknown. --!>
	    <?php
		$checkNameEmailError = $_GET['nameEmailFail'];
		if ($checkNameEmailError == 'true') {
		    echo '<p> Email Address or Account Already In Use </p>';
		}
	    ?>
	</div>
	
	<div id='PasswordErrorText'>
	    <!--Check if both password fields match--!>
	    <!--As of right now there are no password requirements. This will change.--!>
	    <?php
		$checkPassError = $_GET['passFail'];
		if ($checkPassError == 'true') {
		    echo "<p> Passwords don't match </p>";
		}
	    ?>
	</div>
	
	<!--Makes sure the fields are filled.--!>
	<div id='EmptyErrorText'>
	    <?php
		$checkEmptyError = $_GET['emptyFail'];
		if ($checkEmptyError == 'true' ) {
		    echo '<p> Some Input Fields Are Empty! </p>';
		}
	    ?>
	</div>
		
	<!--Make sure the box is checked.--!>
	<div id='HumanErrorText'>
	    <?php
		$checkHumanError = $_GET['humanFail'];
		if ($checkHumanError == 'true') {
		    echo '<p> Click Checkbox If Human </p>';
		}
	    ?>
	</div>
	</div>
    </body>
</html>
