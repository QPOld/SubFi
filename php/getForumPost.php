<?php
    /*
	SubFi - 2015
	Michael Parkinson

	This function gets the last 20 post titles from a subforum. It then returns an array of the
	twenty titles which is then displayed in a table.
    */
    function getFullPost($postID,$forumType) {
	
	//This should be hidden.
	$username = "getpostUser";
        $password = "userGetPost";
        $database = "forumdata";
        
	//connect to database
	$con = mysqli_connect("localhost",$username,$password,$database) or die("Did Not Connect" .
	mysqli_error($con));
	$strSQL = "SELECT detail,topic FROM forumdata.forumpost WHERE name='".
	$forumType."' AND id='".$postID."'";
	
	$query = mysqli_query($con,$strSQL); // makes query
	$queryArray = mysqli_fetch_array($query); // turns query into array
	
	return $queryArray;
    }
?>
