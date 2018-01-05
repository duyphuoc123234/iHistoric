<?php
session_start();

$target_dir = "avatars/";
$target_dir_temp = "temp/" . $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_dir_temp,PATHINFO_EXTENSION));
$target_file = $target_dir . $_SESSION['hash'] . '.' . $imageFileType;
$uploadOk = 1;


if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
		$uploadOk = 0;
        $_SESSION['message'] = "File is not image!";
		header("location: error.php");    
    }
}

// Check file size less than 800kb 
if ($_FILES["fileToUpload"]["size"] > 800000) { // With bytes
$uploadOk = 0;
    $_SESSION['message'] = "Sorry , image size are to huge!";
	header("location: error.php");    
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
	$uploadOk = 0;
	$_SESSION['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	header("location: error.php");    
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $_SESSION['message'] = "Sorry, your img won't upload!";
	header("location: error.php");    
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Your imag updated without error , Please wait 2 sec !";
		header( "refresh:2;url=profile.php" );
    } else {
        $_SESSION['message'] = "Sorry, there error while uploading your file!";
	header("location: error.php");    
    }
}
?>