<?php
	require '../assets/php/connection_db.php';
	SWITCH ($_POST['TYPE']) {
		case 'GET_IMG':
		$result = $mysqli->query("SELECT images FROM lessons WHERE id='".$_POST['l_id']."'");
		
		if ( $result->num_rows == 0 ){ 
			
		}
		else { 
			
			$less = $result->fetch_assoc();
			echo $less['images'];
		}
		break;
		case 'IMG_ADD':
		$target_dir = "img/";
		$target_dir_temp = "temp/" . $target_dir . basename($_FILES["file"]["name"]);
		$imageFileType = strtolower(pathinfo($target_dir_temp,PATHINFO_EXTENSION));
		$finalDir = $target_dir . rand(0,99999) .'_'.$_POST['l_id'].'.' . $imageFileType;
		
		$check = getimagesize($_FILES["file"]["tmp_name"]);
		if($check !== false) {
			$upload = 1;
			} else {
			$upload = 0;
			echo "Can't upload , Not supported!";
		}
		
		if ($_FILES["file"]["size"] > 2000000) { 
			$uploadOk = 0;
			echo "Can't upload , Image too big !";  
		}
		
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			$uploadOk = 0;
			echo  "Cant' file , Only JPG PNG JPEG GIF Supported !";	 
		}
		
		if ( 0 < $_FILES['file']['error'] && $upload == 0) {
			echo 'Error: ' . $_FILES['file']['error'] . '<br>';
		}
		else if($upload != 0) {
			move_uploaded_file($_FILES['file']['tmp_name'],$finalDir);
			echo 'Image uploaded with sucesse!';
			$result = $mysqli->query("SELECT images FROM lessons WHERE id='".$_POST['l_id']."'");
			if ( $result->num_rows == 0 ){ 
				
			}
			else { // User exists
				
				$less = $result->fetch_assoc();
				if($less['images'] != null) {
					$pre_arr = json_decode($less['images'],true);
					array_push($pre_arr,$finalDir);
					$js = json_encode($pre_arr);
					$mysqli->query("UPDATE lessons SET images='$js' WHERE id='".$_POST['l_id']."'") or die($mysqli->error);
					}else {
					$array_i = array($finalDir);
					$j = json_encode($array_i);
					$mysqli->query("UPDATE lessons SET images='$j' WHERE id='".$_POST['l_id']."'") or die($mysqli->error);
				}
				
			}
		}
		break;
		
		case "DEL_IMG":
		if(isset($_POST['img'])) {
			$img_id = $_POST['img'];
			$result = $mysqli->query("SELECT images FROM lessons WHERE id='".$_POST['l_id']."'");
			if ( $result->num_rows == 0 ){
				
			}
			else {
				
				$less = $result->fetch_assoc();
				if($less['images'] != null) {
					$pre_arr = json_decode($less['images'],true);
					for($k = 0;$k < count($pre_arr);$k++) {
						if($img_id === $pre_arr[$k]) {
							unlink($pre_arr[$k]);
							$pre_arr = array_diff($pre_arr, array($pre_arr[$k]));
						}
					}
					$pre_arr = array_values($pre_arr);
					$js = json_encode($pre_arr);
					$mysqli->query("UPDATE lessons SET images='$js' WHERE id='".$_POST['l_id']."'") or die($mysqli->error);
					echo "Image deleted !";
				}
			}
			
			
			}else {
			echo 'Image ID is empety , Can not delete img !';
		}
		break;
		case "SAVE_TEX":
		$cont = $_POST['CONT'];
		$tit = $_POST['TITLE'];
		$date =  date("Y-m-d H:i:s");   
		$keyw = $_POST['KEYW'];
		
		$result = $mysqli->query("SELECT content FROM lessons WHERE id='".$_POST['l_id']."'");
		if ( $result->num_rows == 0 ){ 
			echo 'We got error on saving ! , Unvalid ID !';
		}
		else { 
			$mysqli->query("UPDATE lessons SET title='$tit' , content='$cont' , date='$date' , keywords='$keyw' WHERE id='".$_POST['l_id']."'") or die($mysqli->error);
			echo 'Saved !';
		}
		
		break;
		case "UPDATEs" :
		
		$result = $mysqli->query("SELECT * FROM lessons WHERE id='".$_POST['l_id']."'");
		
		if ( $result->num_rows == 0 ){ 
			
		}
		else { 
			$less = $result->fetch_assoc();
			$temp_ar = Array("Title"=>$less['title'],"Content"=>$less['content'],"Keywords"=>$less['keywords']);
			echo json_encode($temp_ar);
		}
		break;
	}
?>