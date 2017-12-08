<?php
	require 'connection_db.php';

	function init_db() {
		
		$file_url = 'assets/dat.dat';
		
		global $mysqli;
		
		if(!(file_exists($file_url))) {
			
			$lessons_query = 'CREATE TABLE `i_historic`.`lessons` ( `id` INT(8) NOT NULL AUTO_INCREMENT , `title` VARCHAR(255) NOT NULL , `content` TEXT NOT NULL , `date` DATETIME  NOT NULL   , 
			`keywords` VARCHAR(255) NOT NULL , `by` VARCHAR(255) NOT NULL , PRIMARY KEY (id)) ENGINE = InnoDB;';
			
			/*$user_query = 'CREATE TABLE `i_historic`.`users` ( `id` INT(8) NOT NULL AUTO_INCREMENT , `name` VARCHAR(30) NOT NULL , `pass` VARCHAR(30) NOT NULL , `date` DATETIME  NOT NULL  , `email` VARCHAR(255) NOT NULL , 
			`level` INT(8) NOT NULL , PRIMARY KEY (id)) ENGINE = InnoDB ;';*/ // Removed this query 
			
			$user_query = ' 
				CREATE TABLE `i_historic`.`users` 
				(
					`id` INT NOT NULL AUTO_INCREMENT,
					`first_name` VARCHAR(50) NOT NULL,
					`last_name` VARCHAR(50) NOT NULL,
					`email` VARCHAR(100) NOT NULL,
					`password` VARCHAR(100) NOT NULL,
					`hash` VARCHAR(32) NOT NULL,
					`active` BOOLEAN NOT NULL DEFAULT 0,
					PRIMARY KEY (`id`) 
				);'; // Added this query to fit new loggin system
			if ($mysqli->query($lessons_query) === TRUE and $mysqli->query($user_query) === TRUE) {
				
				$f = fopen($file_url ,"w+");
				
				fwrite($f , "Connecting to data base .... Connected \nEating Potatos .... Done! \nCreated lessons table \nCreated useres table");
				
				fclose($f);
				
				return false;
				
			}else {
				
				echo "We got problem on ini DataBase , <strong> Error :".$mysqli->error."</strong><br>";
			
				return false ; 
				
			}
			
		}else {
			
			return true;
			
		}
		
	}
	
?>