<?php

	$server = 'localhost';
	
	$username   = 'root';
	
	$password   = '';
	
	$database   = 'i_historic';
	
	$mysqli = new mysqli($server, $username, $password, $database);
	
	if ($mysqli->connect_errno or !isset($mysqli)) {
		
		echo ("Connect failed: $mysqli->connect_error ");
		
		exit();
		
	}
	
?>