<!--
    SubFi - 2015
    Michael Parkinson

    This is the User Forum Directory (UFD)
	This pge contains a dropdown menu of all the options for a forum. Upon clicking a subforum
	link from the dropdown menu a table will be filled out below with the values of the
	forum(posts).
	
	Users will be able to add/edit/delete posts that they control (they made or will make)
	
	Users can not post in the Announcement SubForums
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

	<title> Forum </title>
	<link rel='stylesheet' type='text/css' href='../stylesheets/forumStyle.css' media='screen' />
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
	<div id='LogoText'>
	    <p> SubFi </p>
	</div>
	<div id='SubLogoText'>
	    <p>Forum Directory</p>
	</div>
	
	<!--Home Button now takes you back to the menuPage.php not index.html. This switch is due
	to the user being logged in. Check menuStyle.css $HomeButton --!>
	<div id='HomeButton'>
	    <form action='../php/menuPage.php' method='post'>
		<input type='submit' name='HomeButton'>
	    </form>
	</div>
	
	<!--This is the dropdown menu of all of the forum directories. Please check the
	forumStyle.css page #ForumText--!>
	<div id='ForumText'>
	    
	    <!--The has-sub class are the headers for each subforum. Each subsubforum of the
	    subforum is a link to the forum--!>
	    <ul>
		
		<!--Admin--!>
		<li class='has-sub'><a href='?'><span>Announcements</span></a>
		    <ul>
			<li><a href='?forumType=News'><span>News</span></a></li>
			<li class='last'><a href='?forumType=Status Updates'><span>Status
			Updates</span></a></li>
		    </ul>
		</li>
		
		<!--Logged/Not Logged--!>
		<li class='has-sub'><a href='?'><span>Help</span></a>
		    <ul>
			<li><a href='?forumType=General Information'><span>General
			Information</span></a></li>
			<li class='last'><a href='?forumType=Technical Support'><span>Technical
			Support</span></a></li>
		    </ul>
		</li>
		
		<!--Logged--!>
		<li class='has-sub'><a href='?'><span>Feedback</span></a>
		    <ul>
			<li><a href='?forumType=Bug Reports'><span>Bug Reports</span></a></li>
			<li class='last'><a
			href='?forumType=Suggestions'><span>Suggestions</span></a></li>
		    </ul>
		</li>
		
		<!--Logged--!>
		<li class='has-sub last'><a href='?'><span>Discussion</span></a>
		    <ul>
			<li><a href='?forumType=General'><span>General</span></a></li>
			<li class='last'><a href='?forumType=Off Topic'><span>Off Topic</span></a></li>
		    </ul>
		</li>
	    </ul>
	</div>
    
	<!--All In One Forum Page. Uses GET/POST to pass forum variables.--!>
	<div id="PostText">
	<?php
	    
	    //The Allowed Forums types are the names of the SubForums.
	    if (isset($_GET['forumType'])) {
		
		$checkForum = $_GET['forumType'];
		$checkCreate = $_GET['create']; // create new post variable
		$_SESSION['forumType'] = $checkForum; // turn get into session
		echo "<table>","<tr>","<th>",$checkForum,"</th>","</tr>","</table>";
		
		//if user wants to create a new post in a subforum
		if (isset($_GET['create'])) {
		    
		    //Check createForumPost.php
		    echo "<div id='PostForm'> ",
		    "<form action='../private/createForumPost.php' method='post'>",
		    "<div id='TitleForm'><input type='text' name='forumTitle' placeholder='Topic'></div>",
		    "<div id='ContentForm'><textarea type='text' name='forumDetail'
		    placeholder='Content'></textarea></div>",
		    "<div id='MakePostButton'>",
		    "<input type='submit' value='Create Post' name='makePost'>",
		    "</div>",
		    "</form>";
		
		} elseif (isset($_GET['makeReply'])) { //Allow the user to make a reply.
		    
		    $postID = $_GET['postID'];
		    $forumType = $_GET['forumType'];
		    $_SESSION['postID'] = $postID; 
		    include "../php/getForumPost.php"; // gets the entire post and displays it.
		    $postInfo = getFullPost($postID,$forumType); 
		    echo "<div id='ContentText'>".$postInfo[0]."</div>";
		    
		    echo "<div id='ReplyForm'>",
		    "<form action='../private/createForumReply.php' method='post'>",
		    "<div id='ReplyText'><textarea type='text' name='replyDetail'></textarea></div>",
		    "<div id='MakeReplyButton'><input type='submit' value='Create Reply'></div>",
		    "</form>",
		    "</div>";
		
		} else {
		    
		    //if the user wants to read the forum post
		    if(isset($_GET['viewPost'])) {
			
			$postID = $_GET['postID'];
			$forumType = $_GET['forumType'];
			
			include "../php/getForumPost.php"; // gets the entire post and displays it.
			$postInfo = getFullPost($postID,$forumType); 
			echo "<div id='TitleText'><p>".$postInfo[1]."</p></div>";
			echo "<div id='ContentText'>".$postInfo[0]."</div>";
			echo "<div id='CommentText'> <p> Comment Section: </p></div>";

			//Reply Button
			echo "<div id='CreateReplyButton'>",
			"<a href='../php/forumPage.php?makeReply=true&forumType=".
			$forumType."&postID=".$postID."'>",
			"<button type='button'> Create Reply </button>",
			"</a>",
			"</div>";

			include "../php/getForumReply.php";
			$replyArray = getFullReply($postID);
			foreach ($replyArray as $value) {
			    echo "<div id='ContentText'>".$value[0]."</div>";
			    echo "<div id='UserNameText'><p>posted by:".$value[1]."</p></div>";
			}
		    } else {

			// Do Not allow posts to be make in News and Status Updates
			if ($checkForum != 'News' && $checkForum != 'Status Updates') {
			    
			    // Simple button that links the create post script
			    echo "<div id='CreatePostButton'>",
			    "<a href='../php/forumPage.php?create=true&forumType=".$checkForum."'>",
			    "<button type='button'>",
			    "Create Post",
			    "</button>",
			    "</a>",
			    "</div>";
			
			}
			
			//gets the last 20 forum posts to a subforum
			include "../php/getForumTitle.php";
			$idtopicArray = getForumTitles($checkForum);
			
			foreach ($idtopicArray as $value){
			    echo "<div id='PostLink'>",
			    "<p>",
			    "<a href='../php/forumPage.php?viewPost=true&forumType=".
			    $checkForum."&postID=".$value[0]."'><span>".$value[1]."</span></a>",
			    "</p>",
			    "</div>",
			    "<div id='UserNameText'>",
			    "<p>posted by: ".$value[2]."</p>",
			    "</div>";
			}
		    }
		}
	    }
	?>
	</div>
    </body>
</html>
