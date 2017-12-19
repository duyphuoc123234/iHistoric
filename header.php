<div class="bar" id="bar-pos" >
		<div class="logo">
			<a href="#">iHISTORIC</a>
			</div>
			<div class="homo_link">
				<a href="#">Home</a> 
				<a href="#">Articles</a>
				<a href="#">Support</a>
				<?php
					if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) { // Check if user logged in to change Log/sign in label with user first name
						echo '<a href ="account/profile.php">'.$_SESSION['first_name'].'</a>';
					}else {
						echo '<a href ="account/">Log In or Sign Up</a>';
					}
				?>
			</div>
		</div>