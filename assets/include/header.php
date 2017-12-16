	<style>
		.wrapper{
	background-color: rgba(31, 31, 31, 1);
	z-index: 1;
}
.op_layer {
	position: absolute;
	top: 0;
    left: 0;
	background:url("../img/history.jpg") ;
	background-repeat: no-repeat;
	font-family: AFBA;
    background-size: cover;
    background-position: bottom center;
    height: 100%;
    width: 100%;
	max-height: 700px;
}

.logo{
	margin: left;
	font-size: 50px;
	position: fixed;
	top: 4px;
}

.bar {
	background-color :  #1d1c1c;
	width: 100%;
	height: 60px;
}
#bar-pos{
	position: fixed;
	z-index: 1;
}

.homo_link {
	position :  fixed;
	font-size : 30px;
	top : 10px;
	left : 56.5%;
}

.bar a {
	font-family : AFBA;
	color : #f0ecec;
	text-decoration: none;
	margin-left : 30px; 
}

.bar a:hover {
	color : #FFFFFF;
}

.text {
	z-index: 1;
	text-align : center;
	color: white;
	text-shadow: 2px 2px #1B1B1B;
	margin-top : 16%;
	font-size: 50px;
	text-transform: uppercase;
}

.search {
	margin: auto;
	width: 650px;
    position: relative;
}

.searchTerm {
    float: left;
    width: 100%;
    border: 3px solid #363636;
    padding: 5px;
    height: 20px;
    border-radius: 4px;
    outline: none;
}

.searchTerm:focus{
    color: #00B4CC;
}
.btn-search{
	font-family: 'Abel', sans-serif;
	margin: 10px 0px 0px 270px;
	padding: 10px 15px 11px !important;
	font-size: 20px !important;
	background-color: #2D2D2D;
	font-weight: bold;
	color: #ffffff;
	border-radius: 5px;	
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border: 1px solid #151515;
	cursor: pointer;
	box-shadow: 0 1px 0 rgba(255, 255, 255, 0.5) inset;
	-moz-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.5) inset;
	-webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.5) inset;
}

@media (max-width: 575px) {  }


@media (min-width: 576px) and (max-width: 767px) {  }


@media (min-width: 946px) and (max-width: 1058px) { 
	.homo_link {
		font-size : 20px;
	}
	.bar {
		background-color :  #1d1c1c;
		width: 100%;
		height: 45px;
	}
	.logo{
		font-size: 30px;
	}
}


@media (min-width: 1058px) and (max-width: 1199px) { 
	.homo_link {
		font-size : 25px;
	}
	.bar {
		background-color :  #1d1c1c;
		width: 100%;
		height: 50px;
	}
	.logo{
		font-size: 40px;
	}
}

@media (min-width: 1250px) {
	.bar a {
		margin-left : 35px; 
	}
}

	</style>
	<div class="op_layer">
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
						echo '<a href ="login_system/profile.php">'.$_SESSION['first_name'].'</a>';
					}else {
						echo '<a href ="account/">Log In or Sign Up</a>';
					}
				?>
			</div>
		</div>
		<div class="text">
			<h1>Welcome you to iHistoric!</h1>
		</div>
		<form action=<?php echo $_SERVER['SCRIPT_NAME']; ?> method="get">
		<div class="search">
      <input type="text" name="search" class="searchTerm" placeholder="What are you looking for?">
      <input type="submit"  value="Search" class="btn-search" />
		</div>
		</form>
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>

