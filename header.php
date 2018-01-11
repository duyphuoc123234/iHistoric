<div class="bar" id="bar-pos" >
		<div class="logo">
			<a href="#">iHISTORIC</a>
			</div>
			<style>

				</style>
		
			<div class="homo_link">
				<a href="#">Home</a> 
				<a href="#">Articles</a>
				<a href="#">Support</a>
				<?php
					if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) { // Check if user logged in to change Log/sign in label with user first name
						echo '
						<a href="#" class="dropbtn"><img class="avatar" src="'. getUserAvatar('login_system/avatars/',$_SESSION['hash']).'"> '.$_SESSION['first_name'].' <img id="dropdown" src="assets/img/dropdown.png" width="15px" height="15px">	
									<i class="fa fa-caret-down"></i>
								</a>
								<div class="dropdown-content" id="drop-down">
									<ul>
										<li><a href ="../iHistoric/login_system/profile.php">Profile</a></li>
										<li><a href ="../iHistoric/login_system/logout.php">Log out</a></li>
									</ul>
								</div>

						';
					}else {
						echo '<a href ="../iHistoric/login_system/index.php">Log In or Sign Up</a>';
					}
				?>
				<script>
				$(document).ready(function() {
				$(document).on("click",".dropbtn",function (event) {
					console.log("j");
					document.getElementById("drop-down").classList.toggle("show");
				});
				window.onclick = function(e) {
					if (!e.target.matches('.dropbtn')) {
						var myDropdown = document.getElementById("drop-down");
						if (myDropdown.classList.contains('show')) {
							myDropdown.classList.remove('show');
						}
					}
				}
				});

			</script>
			</div>
		</div>
