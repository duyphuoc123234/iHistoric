<!DOCTYPE html>
<html>
	<head>
		<script src='assets/tinymce/tinymce.min.js'></script>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/index-script.js"></script>
		<script src="assets/js/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/css/style_sheet.css?v=<?php echo time(); ?>" />
		<script>
			// Scraaaaapt
		</script>
		<style>
			body {
			font-family: AFBA;
			}
			.container {
			width: 100%;
			align:center;
			margin-left: 20px;
			margin-bottom: 100px;
			word-wrap: break-word;
			}
			.content-header {
			margin: 5px 0 5px 20px;
			}
			.content-left {
			float : left; 
			width: 250px;
			margin-right: 10px;
			}
			.content-center {
			
			float : center;
			width:750px;
			margin : 0 auto;
			padding-top : 1px;
			}
			.content-right {
				float : right; 
				width: 250px;
				
			}
		</style>
	</head>
	<body>
		<?php 
			require('header.php');
			for($t =0;$t <5 ; $t++) {
				echo '<br>';
			}
		?>
		<div class='content-header'>
			<h1> Title </h1>
			fseoif^sejfosejfpisjefipsjfipjspjrfgn,pidnjgpi,pgijpgkdp,gijfgbkldjghidjgkm$jdigdt
			<hr style="width : 100%;" size="2">
		</div>
		<div class='container'>
			<div class='content-left'>
				<h1> Articles </h1>
				
			</div>
			<div class='content-right'>
				<div class='content-user-info'>
					<h1> User </h1>
					
				</div>
				
				<div class='content-ads'>
					<h1> Ads </h1>
					
				</div>
				
			</div>
			<div class='content-center'>
				<h1> Content </h1>
				
			</div>
			
		</div>
		<?php 
			for($t =0;$t <10 ; $t++) {
				echo '<br>';
			}
			require('footer.php'); ?>
			</body>
			</html>			