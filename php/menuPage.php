<!--
    SubFi - 2015
    Michael Parkinson

    The Returning User Menu Screen (RUMS).
	This is the main menu for the entire site once a user is logged in. It will eventually allow
	a user to:
	    navigate the entire site
	    enter the forums
	    edit account info
	    plus additonal things in the future
	
	As of 9-2015 the forum works...
--!>
<!DOCTYPE html>
<html>
    
    <head>
	<meta charset='utf-8'>
	<meta name='description' content="Welcome to SubFi.">
	<meta name="keywords" content="SubFi,SubFi webserver, SubFi app">
	<meta name="author" content="SubFi">

	
        <title> Main Menu </title>
        <link rel='stylesheet' type='text/css' href='../stylesheets/menuStyle.css?<?php echo time();?>' media='screen' />
	<?php
	    // Start Session and check if user is still logged in.
            session_start();
	    ini_set('session.cache_limiter','public');
	    session_cache_limiter(false);
    
	    $checkLogged = $_SESSION['logged'];//get logged
            
	    if (!$checkLogged) {
		//Not Logged In.
                header("Location:../html/index.html");
                exit();
            }
	    
	    $_SESSION['logged'] = $checkLogged;//send logged
        ?>

    </head>

    <body>
	<form action='../php/menuPage.php' method='post'>	
	    <div id="LogoText">
		<p> SubFi</p>

		<!--Again The HomeButton. Check loginStyle for #HomeButton. Takes the user back to
		the index.html page--!>
		<div id='HomeButton'>
		    <input type='submit'>
		</div>
	    </div>	
	</form>
	
	<!--Can be used to display account information on the main menu--!>
	<div id='SubSubLogoText'>
	    <?php
		echo 'Welcome, '.$_SESSION['username'];
	    ?>
	</div>
	

	<!--A Button that takes the user to the forums.--!>
	<div id='ForumText'>
	    <ul>
		
		<li class='has-sub'> <a href='?'><span>Applications<span></a>
		    <ul>
			<li>
			    <form action='../php/classStatistics.php' method='post'>
				<?php
				    $_SESSION['logged'] = $checkLogged;
				?>
				<input type='submit' value='Classroom Statistics' name='menuButton'>
			    </form>
			</li>

			<li>
			    <form action='../html/gamescreen.html' method='post'>
				<?php
				    $_SESSION['logged'] = $checkLogged;
				?>
				<input type='submit' value='Game' name='menuButton'>
			    </form>
			</li>

			<li class='last'>
			    <form action='../php/fileStorage.php' method='post'>
				<?php
				    $_SESSION['logged'] = $checkLogged;
				?>
				<input type='submit' value='File Storage' name='menuButton'>
			    </form>
			</li>
		    </ul>
		</li>
		
		<li class='has-sub'><a href='?'><span>Options</span></a>
		    <ul>
			<li class='last'>
			    <form action='../private/logout.php' method='post'>
				<input type='submit' value='Log Out' name='menuButton'>
			    </form>
			</li>
		    </ul>
		</li>
	    </ul>
	</div>
	
	<?php
	    //If the user did not check the original verificaiton email sent upon registration then
	    //they have the optin to resend the email. Once the account is verified this option will
	    //not be shown again.
	    if ($_SESSION['verified'] == 'N') {
		echo "<form action='../private/resendEmail.php' method='post'>","<input
		type='submit' value='Verify Email'>","</form>";
	    }
        ?>
	<div id='ReSentText'>
	    <?php
		$checkReSent = $_GET['resent'];
		if ($checkReSent == 'true') {
		    echo '<p> Verification Email Sent! </p>';
		}
	    ?>
	</body>
</html>
