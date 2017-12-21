<?php
/* Displays user information and some useful messages */
session_start();
require '../assets/php/util.php';
$able_to = false;
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome <?= $first_name.' '.$last_name ?></title>
  <?php include 'css/css.html'; ?>
  <style>
	.avatar {
		
		border-radius: 50%;
		width : 120px;
		height: 120px;
		display: block;
		margin-left: auto;
		margin-right: auto
	}
  </style>
</head>

<body>
  <div class="form">

        <?php echo '<img class="avatar" src="'. getUserAvatar('avatars/',$_SESSION['hash']).'">' 	?>
          
          <p>
          <?php 
     
          // Display message about account verification link only once
          if ( isset($_SESSION['message']) )
          {
              echo $_SESSION['message'];
              
              // Don't annoy the user with more messages upon page refresh
              unset( $_SESSION['message'] );
          }
          
          ?>
          </p>
          
          <?php
          
          // Keep reminding the user this account is not active, until they activate
          if ( !$active ){
              echo
              '<div class="info">
              Account is unverified, please confirm your email by clicking
              on the email link!
              </div>';
			  $able_to = true;
			  if(isset($_COOKIE["anti_spam"])) {
				echo
				'<br> <div class="info">
				You must wait 1 hour and 30 min to resend verification mail ! 
				</div>';
				$able_to = false;
			  }
          }
          
          ?>
          
          <h2><?php echo $first_name.' '.$last_name; ?></h2>
          <p><?= $email ?>  <br>
		  </p><?php 
		  if($active) {
		  echo '
			<form action="avatar.php" method="post" enctype="multipart/form-data">
				<div class="field-wrap">
					<h2>Upload your avatar:</h2>
					<input type="file" name="fileToUpload" id="fileToUpload">
					<!--<input type="submit" value="Upload Image" name="submit">-->
					<button class="button button-block" style =" width:50%; font-size: 20px; margin: 10px 0px 0px 120px; " name="login" />Upload Image</button>
				</div>
			</form>
					';
				}
				?>
			</form>
          <a href="../"><button class="button button-block" name="logout"/>Home</button></a> <br> <!-- Add Main page button -->
			<?php	
			if($able_to) {
				echo'<a href="mail.php"><button class="button button-block" name="logout"/>Resend Link</button></a><br />';
			}
		  ?>
		  <a href="logout.php"><button style="background: #FF3B3F !important" class="button button-block" name="logout"/>Log out</button></a> <br>

    </div>
    
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
