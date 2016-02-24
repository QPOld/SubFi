<?php
    /*
	SubFi - 2015
	Michael Parkinson
    */
    
    session_start(); // start session to get private variables

    // These should be hidden
    $username = "forumUser";
    $password = "userForum";
    $database = "forumdata";

    // User entered data for the new forum post.
    $forumTopic = $_POST['forumTitle'];
    $forumDetail = $_POST['forumDetail'];
    $forumName = $_SESSION['forumType'];
    $conUser = $_SESSION['username'];
    
    // Fields must not be emtpy.
    if (empty($forumDetail) || empty($forumTopic)) {
	// Empty Fields
	header("Location:../php/forumPage.php?fieldFail=true&forumType=".$forumName);
        exit();
    }
    
    // Connect to the user database
    $con = mysqli_connect("localhost",$username,$password,$database) or die("Did Not Connect" .
    mysqli_error($con));
    $strSQL = "INSERT forumdata.forumpost (`topic`,`detail`,`name`,`datetime`,`user`) VALUES
    ('".$forumTopic."','".$forumDetail."','".$forumName."','".date("Y-m-d G:i")."','".$conUser."')";
    $query = mysqli_query($con,$strSQL);
    
    //Initialize query check to fail
    $queryCheck = 0;
    while($result = mysqli_fetch_array($query)) {
	//Post was Made
        $queryCheck = 1;
    }

    // handle the query check
    if ($queryCheck == 0) {
	
	//Post failed
        header("Location:../php/forumPage.php?postFail=true&forumType=".$forumName);
        exit();
    
    } else {
        //Post Success.
	//Pass session variables
	$_SESSION['username']  = $conUser;
        $_SESSION['useremail'] = $conEmail;
	$_SESSION['logged'] = TRUE;
        
	header("Location:../php/forumPage.php?forumType=".$forumName);
	exit();
    }
?>
