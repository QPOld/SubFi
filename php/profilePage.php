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
	
	<!--SubFi Logo Text --!>
	<form action='../php/menuPage.php' method='post'>
	    <div id="LogoText">
		<p> SubFi</p>
		<!--Again The HomeButton. Check loginStyle for #HomeButton. Takes the user back to the
		index.html page.--!>
		<div id='HomeButton'>
		    <input type='submit'>
	        </div>
	    </div>
	</form>
	
	<div id='SubLogoText'>
	    <p> User Profile </p>
	</div>

	<div id='SubSubLogoText'>
	    <?php
		session_start();
		$userName = $_SESSION['username'];

		include "../private/getUserInfo.php";
		$userInfo = getUserInfo($userName);
		
		echo "<div id='UserInfo'><table style='width=100%'>",
		"<tr><td>Email Address:</td><td>".$userInfo[1]."</td></tr>",
		"<tr><td>Account Name:</td><td>".$userInfo[2]."</td></tr>",
		"<tr><td>Verified:</td><td>".$userInfo[4]."</td></tr>",
		"<tr><td>Sign Up Date</td><td>".$userInfo[5]."</td></tr>",
		"<tr><td>Latitude</td><td>".$userInfo[6]."</td></tr>",
		"<tr><td>Longitude</td><td>".$userInfo[7]."</td></tr>",
		"<tr><td>Floor</td><td>".$userInfo[8]."</td></tr>",
		"<tr><td>IP:</td><td>".$userInfo[9]."</td></tr>",
		"</table></div>";


	    ?>
	</div>
	
	<div id='ForumText'>
	    <ul>                 
		<li class='has-sub'> <a href='?'><span>Profile Options<span></a>
		    <ul>
			</li>
			    <form action='../private/testWifiConnection.php' method='post'>
				<?php
				    //../private/testWifiConnection.php
				    $_SESSION['ip'] = $userInfo[9];
				    $_SESSION['logged'] = $checkLogged;
				?>
				<input type='submit' value='Test Router' name='MenuButton'>
			    </form
			</li>
			<li class='last'>
			    <form action='../php/profilePage.php' method='post'>
				<?php
				    //../php/updateInfoPage.php this is the real page for this
				    //button
				    $_SESSION['logged'] = $checkLogged;
				?>
				<input type='submit' value='Update Information' name='MenuButton'>
			    </form>
			</li>
		    </ul>
		</li>
	    </ul>
	</div>
    </body>
</html>
