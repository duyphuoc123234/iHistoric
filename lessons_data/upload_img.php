<?php

		// $target_dir = "img/";
		// $target_dir_temp = "temp/" . $target_dir . basename($_FILES["fileToUpload"]["name"]);
		// $imageFileType = strtolower(pathinfo($target_dir_temp,PATHINFO_EXTENSION));
		// $target_file = $target_dir . $_FILES["fileToUpload"]["name"].'.' . $imageFileType;
		// $uploadOk = 1;


		// $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		// if($check !== false) {
			// $uploadOk = 1;
		// } else {
			// $uploadOk = 0;
			// echo 'CANT';
		// }

		// if ($_FILES["fileToUpload"]["size"] > 2000000) { 
			// $uploadOk = 0;
			// echo "SIZE";
			  
		// }

		// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			// && $imageFileType != "gif" ) {
			// $uploadOk = 0;
			// echo  "TYPES";
			 
		// }
					
		// if ($uploadOk == 0) {
			// echo "SORRY";   
		// } else {
			// $ext = Array('.png','.gif','.jpeg','.jpg');
			// foreach($ext as $f_d){
				// if(file_exists($target_dir . $f_d)) {
					// unlink($target_dir . $f_d);
				// break;
			// }
		// }
			// if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				// echo "Your imag updated without error!";
			// } else {
					// echo "SUCESS";
			// }
		// }
	
	if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], 'img/' . $_FILES['file']['name']);
    }
?>