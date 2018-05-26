<?php
session_start();
	require 'assets/php/database.php';
	require 'assets/php/util.php';
	if(init_db()) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<title><?php
			if(isset($_GET['search'])){
				echo $_GET["search"].' - Search iHistoric';
			}else {
				echo "iHistoric";
			}
		?></title>
        <meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Zeroual_Aymene">
		<link rel="stylesheet" type="text/css" href="assets/css/style_sheet.css?v=<?php echo time(); ?>" />
		<link rel="stylesheet" type="text/css" href="assets/css/animate.css" />
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" />
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/index-script.js"></script>
		<script src="assets/js/jquery-ui.min.js"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
	<body>
	<?php 
		if(isset($_GET['search'])) {
			$test_s = "Hi there my name pootis penser hir boy yea nigsu : froud";
			
			$test_obj  = searchForWords($test_s,$_GET['search']);
			echo $test_obj->n_words;
			
		}else {
	?>
<!--   Header   -->

	<div class="op_layer">
		<?php require("header.php");?>
		<div class="text">
			<h1>Welcome you to iHistoric!</h1>
		</div>
		<form action=<?php echo $_SERVER['SCRIPT_NAME']; ?> method="get">
			<div class="search">
      			<input type="text" name="search" class="searchTerm" placeholder="What are you looking for?">
      			<input type="submit"  value="Search" class="btn-search" />
			</div>
		</form>

<!--   Content   -->
  	  		
   	  		<div class="content">
   	  			<div id="intro" class="space">
					<h1>A FEW INTRODUCTIONS ABOUT <span>iHISTORIC!</span></h1>
					<p>Well, many of us find learning history is "Boring". We've spent most of our time at school studying history for nothing - copy like a parrot, knows nothing, and all for marks! Your teacher forces you learning by heart those "Useless" numbers and events that you wonder: Is it meaningful to my life? </p>
					<p>Do you know? History is very intersting if you know how to learn in the positive ways. With <span>iHistoric</span>, we give you the cleanest definitions and informations, and also funny images of them, too!</p>
				</div>
				<div id="features-wrap" class="space">
					<h2> Main Features</h2>
					<img class="img-homepage" id="img1" src="assets/img/box1.png">
					<img class="img-homepage" id="img2" src="assets/img/box2.png">
					<img class="img-homepage" id="img3" src="assets/img/box3.png">
				</div>
					<div id = "features-wrap-2" class="space">
						<h1>WEBSITE COMING SOON!</h1>
					</div>
				</div>	
		<?php require("footer.php"); ?>
    </body>
</html>

<?php
	}
	}else {
		
		echo 'We are init every databases ,Please refresh web site to finish If you didnt get a Error!';
		
	}
	
?>