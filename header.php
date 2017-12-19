<div class="bar" id="menu" >
		<div class="logo">
			<a href="#">iHISTORIC</a>
			</div>
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Articles</a></li>
				<li><a href="#">Support</a></li>
				<li><?php
					if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) { // Check if user logged in to change Log/sign in label with user first name
						echo '<a href ="../iHistoric/login_system/profile.php">'.$_SESSION['first_name'].'<img id="dropdown" src="assets/img/dropdown.png" width="15px" height="15px"></a>';
					}else {
						echo '<a href ="../iHistoric/login_system/index.php">Log In or Sign Up</a>';
					}
					?></li>
			</ul>
		</div>
