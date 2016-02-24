<?php
    /*
	SubFi - 2015
	Michael Parkinson

	This is the Get Post Reply Function (GPRF).

	Given a post ID this function will return all the replys. It works similar to the
	getForumTitle.php function.
    */

    function getFullReply($postID){
	$username = "getreplyUser";
	$password = "userGetReply";
	$database = "forumdata";

	//connect to database
	$con = mysqli_connect("localhost",$username,$password,$database) or die("Did Not
	Connect".mysqli_error($con));
	$strSQL = "SELECT content,username FROM forumdata.forumreply WHERE postid='".$postID."'";
	//Make Query.
	$query = mysqli_query($con,$strSQL);
	$replyArray = array();
	
	//Create Array of Results.
	while ($row = mysqli_fetch_array($query) ){
	    $replyArray[] = $row;
	}
	
	return $replyArray;
    }
?>
