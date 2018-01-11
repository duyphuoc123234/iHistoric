<!DOCTYPE html>
<?php
session_start();
require 'assets/php/database.php';
require 'assets/php/connection_db.php';
require 'assets/php/util.php';

$stat;
if(!isset($_SESSION['active']) or $_SESSION['active'] != 2) {
	header("location: index.php");
}else {
	if(!isset($_POST['STATE'])){
		$state = 0;
	}else {
		switch($_POST['STATE']){
			case 'MAIN':
				$state = 1;
				break;
			case 'USERS':
				$state = 2;
				break;
			case 'LESSONS':
				$state = 3;
				break;
			default:
				$state = 0;
				break;
			
		}
	}
	if(isset($_POST['ACTION']) and $_POST['ACTION'] == 'DELETE') {
		$result = "DELETE FROM users WHERE hash='".$_POST['hash_s']."'";
		if($mysqli->query($result) === TRUE)
		{   
			$_SESSION['admin_msg'] = 'User deleted!';
		}
		else {
			$_SESSION['admin_msg'] = "Can't delete user!";
		}     
	}
?>

<html>
<head>
<style>
@font-face {
    font-family: AFBA;
    src: url("assets/AGENCYR.ttf");
}
body {
    margin: 0;
	font-family: AFBA;
	background-color: #e7e7e7;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 20%;
    background-color: #1d1c1c;
    position: fixed;
    height: 100%;
    overflow: auto;
}
li {
	font-size: 15px;
    color: white;
	text-align: center;
}

li a {
    display: block;
	font-size: 30px;
    color: white;
    padding: 8px 16px;
    text-decoration: none;
	text-align: center;
}

li a.active {
    background-color: #424141;
    color: white;
}

li a:hover:not(.active) {
    background-color: #424141;
    color: white;
}

.avatar { 
	border-radius: 50%;
	height: 60px;
	width: 60px;
	margin-left: auto;
	margin-right: auto;
	display: block;
	padding-top: 10px;
}

.avatar_s { 
	border-radius: 0;
	height: 40px;
	width: 40px;
}

hr {
	border-top: 3px double #d6d6d6;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #d6d6d6}

th {
    background-color: #282727;
    color: white;
}

.action_a {
	font-size: 19px;
    color: red;
    text-decoration: none;
}

.admins_msg{
		display: block;
	font-size: 30px;
    color: green;
    padding: 8px 16px;
	text-align: center;
}
</style>
</head>
<body>

<ul>
  <li><?php echo '<img class="avatar" src="'. getUserAvatar('login_system/avatars/',$_SESSION['hash']).'">' ;?> <h1>Welcome back!</h2> </li>
  <hr>
  <li>
	<form id="ch_main" action="admin.php" method="post">
		<input type="hidden" name="STATE" value="MAIN"/>
		</form>
		<a <?php if($state === 0 or $state == 1) { echo 'class="active"';} ?> href='#' onclick='document.getElementById("ch_main").submit();'>Main</a>
  </li>
  <li>
	<form id="ch_users" action="admin.php" method="post">
		<input type="hidden" name="STATE" value="USERS"/>
		</form>
		<a <?php if($state == 2) { echo 'class="active"';} ?> href='#' onclick='document.getElementById("ch_users").submit();'>Users</a>
  </li>
  <li>
	<form id="ch_Lessons" action="admin.php" method="post">
		<input type="hidden" name="STATE" value="LESSONS"/>
		</form>
		<a <?php if($state === 3) { echo 'class="active"';} ?> href='#' onclick='document.getElementById("ch_Lessons").submit();'>Lessons</a>
  </li>
  <li><a href="index.php">Exit</a></li>
</ul>
<div style='margin-left:21%;padding:1px 16px;height:1000px;'>
<?php
if($state == 0 or $state == 1) {
	echo "
	<h1>Bruhhh.....,I'm out of Ideas about Main page </h1>
	</div>
	";
}else if($state == 2) {
	
	echo '
	<h1>Users Table : </h1>
	 <table>
  <tr>
	<th>Picture</th>
    <th>ID</th>
    <th>Hash</th>
    <th>Email</th>
	<th>Username</th>
	<th>Status</th>
	<th>Action</th>
  </tr>
  
  ';
  if($result = $mysqli->query("SELECT * FROM users ORDER by id")) {
	while ($obj = $result->fetch_object()) {
		if($obj->active === 1){
			$a = '<td style="color:green;">Active</td>';
		}else if($obj->active == 2){
			$a = '<td style="color:orange;">Mod</td>';
		}else{
			$a = '<td style="color:red;">Unactive</td>';
		}
        echo '
		<tr>
			<td><img class="avatar_s" src="'. getUserAvatar('login_system/avatars/',$obj->hash).'"> </td>
			<td>'.$obj->id.'</td>
			<td>'.$obj->hash.'</td>
			<td>'.$obj->email.'</td>
			<td>'.$obj->first_name.' '.$obj->last_name.'</td>
			'.$a.'
			<td>
				<form id="user_acs_'.$obj->hash.'" action="admin.php" method="post">
				<input type="hidden" name="ACTION" value="DELETE"/>
				<input type="hidden" name="hash_s" value="'.$obj->hash.'"/>
				</form>
				<a class="action_a" href="#" onclick= \'document.getElementById("user_acs_'.$obj->hash.'").submit()\'>Delete</a>
			</td>
		</tr>
		'
		;
		
		if(isset($_SESSION['admin_msg'])) {
			echo '<span class="admins_msg">'.$_SESSION['admin_msg'].'</span>';
			$_SESSION['admin_msg'] = null;
		}
		}
	}
  /*<div class="row">
    <span class="cell primary" data-label="Hash_Code">Hash<span>
    <span class="cell" data-label="ID">ID</span>
     <span class="cell" data-label="Email">Email</span>
     <span class="cell" data-label="Username">Username</span>
    <span class="cell" data-label="Password">Password</span>
	<span class="cell" data-label="Status">status</span>
	<span class="cell" data-label="Action"><a>Remove</a></span>
  </div>
  */
  
echo '</table>';

}else if($state == 3) {
	echo '
	frjsfddk
	';
}
?>
</div>

</body>
</html>

<?php
}
?>