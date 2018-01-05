<div class="bar" id="bar-pos" >
		<div class="logo">
			<a href="#">iHISTORIC</a>
			</div>
			<style>
				.dropdown-content {
						display: none;
						position: absolute;
					
						background-color: #1d1c1c;
						padding: 5px;
						min-width: 160px;
						box-shadow: 0px 30px 16px 0px rgba(0,0,0,0.2);
						z-index: 1;
						margin-left: 350px;
				}
				.show {
					display: block;
				}
				.avatar { 
					border-radius: 50%;
					height: 40px;
					width: 40px;
				}
				
				ul, li {
					list-style-type: none;
					margin: 0;
					padding: 0;
				}
				</style>
		
			<div class="homo_link">
				<a href="#">Home</a> 
				<a href="#">Articles</a>
				<a href="#">Support</a>
				<?php
					if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) { // Check if user logged in to change Log/sign in label with user first name
						echo '
						<a href="#" class="dropbtn"> '.$_SESSION['first_name'].' <img id="dropdown" src="assets/img/dropdown.png" width="15px" height="15px">	
									<i class="fa fa-caret-down"></i>
								</a>
								<div class="dropdown-content" id="drop-down">
									<ul>
										<li><a href ="../iHistoric/login_system/profile.php">Profile</a></li>
										<li><a href ="../iHistoric/login_system/logout.php">Log out</a></li>
									</ul>
								</div>
						<img class="avatar" src="'. getUserAvatar('login_system/avatars/',$_SESSION['hash']).'">
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
