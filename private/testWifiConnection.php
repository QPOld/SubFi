<?php
    /*
	SubFi - 2015
	Michael Parkinson

	Test User Wifi by IP Ping
    */
    session_start();
    $ipAdd = $_SESSION['ip'];
    header('Location: ../php/profilePage.php?checkIP=true');
    exit();
?>
