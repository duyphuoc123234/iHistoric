<?php
// Send registration confirmation link (verify.php)
	session_start();
	require '../assets/php/connection_db.php';
	
	$email = $_SESSION['email'];
	$hash = $_SESSION['hash'];
	$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
	if ( $result->num_rows == 0 ){ // User doesn't exist
		$_SESSION['message'] = "The account URL is invalid!";
		header("location: error.php");
	}
	else { // User exists
    $user = $result->fetch_assoc();

    if ( $user['activate'] == 0) {
        
        $to      = $email;
        $subject = 'Account Verification ( iHistoric.com )';
        $message_body = '
        Hello '.$first_name.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://'.$_SERVER['SERVER_NAME'].'/login_system/verify.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );
		
		setcookie("anti_spam", "set", time() + ( 3600 + ( 3600 / 2) ), "/");
		
        header("location: profile.php");
    }
    else {
        $_SESSION['message'] = "Account already activated !";
        header("location: error.php");
    }

	}
?>