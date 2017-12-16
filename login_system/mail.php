<?php
// Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification ( iHistoric.com )';
        $message_body = '
        Hello '.$first_name.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://'.$_SERVER['SERVER_NAME'].'/account/verify.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );
    }
?>