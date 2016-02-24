<?php
    /*
	SubFi - 2015
	Michael Parkinson

	This is the Show Post Titles Function (SPTF)
	    For a given subforum this will return the title of the last 20 posts.
    */
    
    function getForumTitles($forumName){
	
	//This needs to be hidden
	$username = "getpostUser";
        $password = "userGetPost";
	$database = "forumdata";
	
	//connect to the DB
	$con = mysqli_connect("localhost",$username,$password,$database) or die("Did Not Connect" .
	mysqli_error($con));
	$strSQL = "SELECT id,topic,user FROM forumdata.forumpost WHERE name='".$forumName."' ORDER BY id
	DESC LIMIT 20";
	

	//Make Query.
	$query = mysqli_query($con,$strSQL);
	$idtopicArray = array();

	//Create Array of Results.
	while ($row = mysqli_fetch_array($query) ){
	    $idtopicArray[] = $row;
	}

	
	return $idtopicArray;
    }
?>
