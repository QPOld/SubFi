<!--
SubFi - 2015
Michael Parkinson

--!>
<!DOCTYPE html>
<html>
    <head>
	<?php
	    // Start Session and check if user is still logged in.
            session_start();
	    $checkLogged = $_SESSION['logged'];//get logged
            
	    if (!$checkLogged) {
		//Not Logged In.
                header("Location:../html/index.html");
                exit();
            }
	    
	    $_SESSION['logged'] = $checkLogged;//send logged
        ?>

	<meta charset='utf-8'>
	<meta name='description' content="Welcome to SubFi.">
	<meta name="keywords" content="SubFi,SubFi webserver, SubFi app">
	<meta name="author" content="SubFi">
	<title> File Storage </title>
	<link rel='stylesheet' type='text/css' href='../stylesheets/fileStorageStyle.css?<?php echo
	time()?>' media='screen' />

    </head>

    <body>

	<form action='../php/menuPage.php' method='post'>
	    <div id="LogoText">
		<p> SubFi</p>

		<div id='HomeButton'>
		    <input type='submit' name='HomeButton'>
		</div>
	    </div>
	</form>
	
	<div id='UploadForm'>
		<form action="../private/fileUpload.php" method='post' enctype="multipart/form-data">
		    <input type="file" name="fileToUpload" id="fileToUpload" >
		    <input type="submit" name="submit" value="Start Upload" >
		</form>   
	</div>

	<div id='SubLogoText'>
	    <p> Uploaded Files </p>
	    <div id='UploadedFiles'>
		<?php
		    $dir = '../uploads';
		    $uploadedFiles = scandir($dir);
		    foreach ($uploadedFiles as &$value) {
		    	if($value != '.' && $value != '..') {
			    echo "<form action='../uploads/".$value."' method='post'><input
			    type='submit' name='uploadedFile' value='".$value."'></form>";
			}
		    }
		?>
	    </div>
	</div>

	<div id='AudioPlayer'>
	    <audio controls>
		<source  src=''/>
	    </audio>
	</div>
</body>
</html>
