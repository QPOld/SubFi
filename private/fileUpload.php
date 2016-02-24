<?php
    /*
	SubFi - 2015
	Michael Parkison

    */
    $target_dir = '../uploads/';
    $target_file = $target_dir . basename( $_FILES['fileToUpload']['name']);
    
    if (file_exists($target_file)) {
	header("Location: ../php/fileStorage.php?exists=true");
	exit();
    }
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        header("Location: ../php/fileStorage.php?failed=false");
        exit();
    } else {
        header("Location: ../php/fileStorage.php?failed=true");
        exit();
    }

?>
