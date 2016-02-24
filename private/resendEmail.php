<?php
    /*
	SubFi - 2015
	Michael Parkinson

	This is the User Verification Mailer (UVM)
	    This uses username and user email session variables to send an email. It uses a third
	    party mailer:
		PHPMailer();
	    The body contains a link to a page that just has a button to verify. This page may or
	    may not change to something that fits the color scheme of the website.
    */

    // These are PHPMailer Classes and are required.
    require_once('../php/PHPMailer/class.phpmailer.php');
    require_once('../php/PHPMailer/class.smtp.php');
    
    //start session to get user variables.
    session_start();
    $conUser = $_SESSION['username'];
    $conEmail = $_SESSION['useremail'];
	
    $mail =  new PHPMailer();

    //sets up mailer for gmail
    $mail->IsSMTP();
    $mail->Port = 465;
    $mail->Host = "smtp.gmail.com";  // specify main and backup server
    $mail->Mailer = "smtp";
    $mail->SMTPSecure = 'ssl';

    //subfi email login - This should be Hidden
    $mail->SMTPAuth = true;     // turn on SMTP authentication
    $mail->Username = "subfiapp@gmail.com";  // SMTP username
    $mail->Password = "gSaqN345"; // SMTP password

    $mail->SingleTo = true; // single address

    //Email Content
    $mail->From = "Subfiapp@gmail.com";
    $mail->FromName = "SubFi.info";
    $mail->AddAddress($conEmail);
    $mail->Subject = "Welcome To SubFi! Thank You For Registering.";
    $mail->Body = "Hello ".$conUser."! <p></p> Welcome to Subfi! <p></p> To complete the account
    registration process <a href='subfi.info/php/ThankYou.php?username=".$conUser."'>please click
    here</a>.<p> </p>> This email is sent by a robot please do not reply. <p>Thank you.</p>";
    
    //Tells the mailer that the body contains html.
    $mail->IsHTML(true);

    //Send The Mail.
    if(!$mail->Send()) {
	//Mail Did Not Sent
	header('Location: ../php/menuPage.php?resent=false');
	exit();
    } else {
	//Mail Sent
	header('Location: ../php/menuPage.php?resent=true');
	exit();
    }
?>
