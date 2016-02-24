<?php
    /*
	SubFi - 2015
	Michael Parkinson

	This is the User Forum Reply Function (UFRF)
	    Each post is tracked by the name and type.
	    The post name is stored with the reply so all replys can be displayed for a given post.
    */
    
    // Get Session Variables
    session_start();
    
    // database login - This needs to be hidden.    
    $username = "replyUser";
    $password = "userReply";
    $database = "forumdata";

    // Get reply text and user info
    $replyDetail = $_POST['replyDetail'];
    $forumID = $_SESSION['postID'];
    $forumName = $_SESSION['forumType'];
    $conUser = $_SESSION['username'];

    
    //Make sure reply is filled.
    if (empty($replyDetail)) {
	header("Location:../php/forumPage.php?fieldFail=true&forumType=".$forumName);
        exit();
    }
    
    //connect to database
    $con = mysqli_connect("localhost",$username,$password,$database) or die("Did Not Connect" .
    mysqli_error($con));
    $strSQL = "INSERT forumdata.forumreply (`postid`,`username`,`content`,`replydate`) VALUES
    ('".$forumID."','".$conUser."','".$replyDetail."','".date("Y-m-d G:i")."')";
    $query = mysqli_query($con,$strSQL);

    //Initialize query check to fail
    $queryCheck = $query;
    
    // handle the query check
    if ($queryCheck == 0) {

	//Post failed
	header("Location:../php/forumPage.php?replyFail=true&forumType=".$forumName."&querycheck=".$query);
	exit();

    } else {
	//Post Success.
	//Pass session variables
	$_SESSION['username']  = $conUser;
	$_SESSION['useremail'] = $conEmail;
	$_SESSION['logged'] = TRUE;
 
	header("Location:../php/forumPage.php?viewPost=true&forumType=".$forumName."&postID=".$forumID);
	exit();
    }
?>
