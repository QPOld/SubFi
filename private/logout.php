<?php
    /*
	SubFi - 2015
	Michael Parkison

	The Simple User Logout (SUL);
	    Destroys a users session such that private pages that require a user to be logged in can
	    not be viewed. After the session is closed the page will redirect itselt to the login
	    screen (loginPage.php)
    */
    session_start();//continue session
    session_destroy();//stop session
	
    header("Location: ../html/index.html");
    exit();
?>
