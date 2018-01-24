<?php
	require 'assets/php/connection_db.php';
	$result = $mysqli->query("SELECT * FROM lessons WHERE id='".$_GET['id']."'");
		
		if ( $result->num_rows == 0 ){ 
			echo "<h1> Can't find lesson or you don't have premission !";
		}
		else { 
?>

<!DOCTYPE html>
<html>
	<head>
		<script src='assets/tinymce/jquery.tinymce.min.js'></script>
		<script src='assets/tinymce/tinymce.min.js'></script>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/index-script.js"></script>
		<script src="assets/js/jquery-ui.min.js"></script>
		<script>
			$(document).ready(function() {
				tinymce.init({
					selector: '#mytextarea',
					plugins : 'advlist autolink link image imagetools lists charmap print preview table help textcolor colorpicker fullscreen media code emoticons wordcount',
					//language : 'vi_VN',
					toolbar: 'undo redo | styleselect | bold italic | link image | numlist  bullist | alignleft  aligncenter  alignright | forecolor  backcolor | table | preview media emoticons',
					width : "1020",
					height : "300",
					setup: function(editor) {
						editor.on('init', function() {
							update();
						});
					}
				});
				var url_string = window.location.href; 
				var url = new URL(url_string);
				var lesson_id  = url.searchParams.get("id");
				
				
				function refreshTable(i_arr,rep) {
					var i_m_url;
					if(!rep) {
						for(var i = 0; i < i_arr.length;i++) {
							/*
								<td><img></td>
								<td><span></td>
								<td><a></td>
							*/
							
							i_m_url = "http://" +window.location.hostname  +"/iHistoric/lessons_data/" + i_arr[i];
							/* ############################################### MUST BE CHANGED WHEN UPLOADED TO SERVER ##############################*/
							$(".imgs_t tr:last").after('<tr class="i_tr"><td><img  class="imgis" src="' + 'lessons_data/' + i_arr[i]+ '"></td> <td><input class="pingus" value="'+ i_m_url +'"/></td>   <td ><a id="'+i_arr[i]+'" class="delete_a" href="#" >Delete</a></td></tr> '); 
							$(".pingus").prop("readonly", true);
						}
						}else {
						$.ajax({
							type: "POST",
							url: 'lessons_data/ajax_man.php',
							data: {"TYPE":"GET_IMG","l_id":lesson_id},
							success: function(data){
								var obj;
								if(data == '') {
									$(".img_container").hide();
									}else {
									obj = $.parseJSON(data);  
									refreshTable(obj);
								}
							}
						});
						$('.i_tr').remove();
						for(var i = 0; i < i_arr.length;i++) {
							i_m_url = "http://" +window.location.hostname  +"/iHistoric/lessons_data/" + i_arr[i];
							/* ############################################### MUST BE CHANGED WHEN UPLOADED TO SERVER ##############################*/
							$(".imgs_t tr:last").after('<tr class="i_tr"><td><img  class="imgis" src="' + 'lessons_data/' + i_arr[i]+ '"></td> <td><input class="ping" value="'+ i_m_url +'"/></td>   <td ><a id="'+i_arr[i]+'" class="delete_a" href="#" >Delete</a></td></tr> '); 
							$(".pingus").prop("readonly", true);
						}
					}
				}
				
				$(document).on("click","a.delete_a",function () {
					var i_id = $(this).closest("a.delete_a").attr("id");
					$.ajax({
						type : "POST",
						url: "lessons_data/ajax_man.php",
						data: {"TYPE":"DEL_IMG","l_id":lesson_id,"img":i_id},
						success: function(data) {
							refreshTable(null,true);
						}
					});
				});
				
				
				$.ajax({
					type: "POST",
					url: 'lessons_data/ajax_man.php',
					data: {"TYPE":"GET_IMG","l_id":lesson_id},
					success: function(data){
						var obj;
						if(data == '') {
							$(".img_container").hide();
							}else {
							obj = $.parseJSON(data);  
							refreshTable(obj);
						}
						
					}
				});
				function update() {
					$.ajax({
						type: "POST",
						url: "lessons_data/ajax_man.php",
						data: {"TYPE":"UPDATEs","l_id":lesson_id},
						
						success: function(response) {                      
							var dat_a = $.parseJSON(response);
							$('.pingus_s').attr('value',dat_a.Title);
							$('.pingus_k').attr('value',dat_a.Keywords);
							tinymce.activeEditor.setContent(dat_a.Content);
						}
					});
				}
				
				$(document).on("click","button.save_b",function () {
					var con = confirm('You wonna save changes ? ');
					if(con){
						var i_t =  tinymce.activeEditor.getContent();
						var tt_t = $('.pingus_s').val();
						var k_t = $('.pingus_k').val();
						$.ajax({
							type: "POST",
							url: 'lessons_data/ajax_man.php',
							data: {'TYPE':'SAVE_TEX', "l_id":lesson_id,'CONT':i_t ,'TITLE':tt_t ,'KEYW':k_t},
							success: function(data) {
							alert(data);
						}
						})
					}
				});
				
				$('.img_form').submit(function(event) {
					
					var file_data = $("#fileToUpload").prop("files")[0];   
					var form_data = new FormData();
					form_data.append("file", file_data); 
					form_data.append('TYPE','IMG_ADD');
					form_data.append("l_id",lesson_id);
					$.ajax({
						type: "POST",
						url: 'lessons_data/ajax_man.php',
						dataType: 'text',  // what to expect back from the PHP script, if anything
						cache: false,
						contentType: false,
						processData: false,
						data: form_data,
						success: function(data){
							alert(data);
							refreshTable(null,true);
						}
						
					});
					
					event.preventDefault();
				});
				
			});
		</script>
		<link rel="stylesheet" type="text/css" href="assets/css/style_sheet.css?v=<?php echo time(); ?>" />
		<style>
			body {
			font-family: AFBA;
			}
			.button {
			background-color: #1d1c1c; 
			border: none;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			font-family: AFBA;
			display: inline-block;
			font-size: 16px;
			margin: auto auto;
			cursor: pointer;
			-webkit-transition-duration: 0.4s; 
			transition-duration: 0.4s;
			}
			
			
			.button_hover:hover {
			box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
			}
			
			.b_container {
			text-align: center;
			}
			.f {
			text-align: center;
			}
			.img-field{
			align: center;
			background-color: #1d1c1c;
			color: white;
			width: 600px;
			margin-left: auto;
			margin-right: auto;
			padding-left: 12%;
			padding-bottom: 10px;
			}
			
			table {
			border-collapse: collapse;
			width: 80%;
			margin-left:auto;
			margin-right:auto;
			}
			
			th {
			text-align: center;
			padding: 8px;
			}
			td {
			text-align: center;
			padding: 3px;
			}
			
			tr:nth-child(even){background-color: #d6d6d6}
			
			th {
			background-color: #282727;
			color: white;
			}
			
			.shit_con {
			display:block;
			margin-left:auto; 
			margin-right:auto;
			width: 1020px;
			}
			
			.imgis {
			height: 100px;
			width: 100px;
			}
			
			.copy_a, .delete_a {
			font-size: 19px;
			color: #282727;
			text-decoration: none;
			}
			
			.pingus{
			width : 330px;
			border: none;
			background: transparent;
			}
			
			.pingus_s, .pingus_k {
			display:block;
			width : 400px;
			margin-left: auto;
			margin-right: auto;
			padding: 8px;
			font-family: AFBA;
			font-size: 20px;
			}
			
			
		</style>
	</head>
	
	<body>
		
		<?php require('header.php');
			for($t =0;$t <5 ; $t++) {
				echo '<br>';
			}
		?>
		<h1 class='f' >Upload your img :</h2>
		<form class='img_form' action="lessons_data/ajax_man.php" method="post" enctype="multipart/form-data">
			<div class="img-field">
				<input type="file" name="fileToUpload" id="fileToUpload">
			<button type='submit' class="button " style =" width:150px; font-size: 20px;  " name="login" />Upload Image</button>
		</div>
	</form>
	<div class="img_container">
		<h1 class='f'>Images table :</h1>
		<table class="imgs_t" style='align : center;'>
			<tr>
				<th>Picture</th>
				<th>Link</th>
				<th>Action</th>
			</tr>
			
		</table>
	</div>
	<h1 class='f'> Edit Lesson : </h1>
	<div class='shit_con'>
		<h2 class='f'> Title : </h2> <input class="pingus_s" value="Shit"/>
		<h2 class='f'> Keywords : </h2> <input class="pingus_k" value=""/>
		<br>
		<br>
		<textarea id="mytextarea" class='shit_con'>Hey ,There !</textarea>
	</div>
	<div class="b_container">
		<br>
		<button class="button button_hover save_b">Save</button>		
		<?php require('footer.php'); ?>
	</body>
</html>
		<?php } ?>