<!DOCTYPE html> 
<html> <!-- All rights reserved </!-->
<title>Test</title>
<link rel="stylesheet" href="style.css">
<script src="js/jquery.vide.min.js"></script>

<BODY
 BGCOLOR="#232322"
 >




<div id="topbar_bg">

</div> <!-- top end </!-->

<div id="slider">

</div>






<div id="seperatorchat">

</div>



<div id="container">

<div id="header">
<h1>Custom CMS</h1>
</div>

<div id="login">


 <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  username:
  <input type="text" name="username">
  password:
  <input type="password" name="password">
  <button type="submit" name="ownProfile">Profile</button>
   <button type="button" onClick="location.href='/hub/usercp.php'">UserCP</button>
	<button type="submit" name="submit" id="login_button" onclick="">Log out</button> 
</form> 



<?php 
	require_once("db_connection.php");
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	// Check connection
	if ($mysqli->connect_errno) { // Return error from last attempted connection {
		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
		exit();
	}	

	@$username = $_POST['username']; // @ Supresses errors.
	@$password = $_POST['password']; // Same as above.
	
	$sql = "SELECT * from accounts WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
	$result = $mysqli->query($sql);
	if (isset($_POST['submit'])){
	session_start();
	$_SESSION['loggedin'] = false;
	session_destroy();
	header("Location: index.php");
	}
?>
</div>

<div id="search">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="text" name="search">
<button type="submit" name="profile" onclick="">Search</button> 
</form>
<?php
if (isset($_POST['profile'])){
$userSearch = $_POST['search'];
$_SESSION['searchValue']= $userSearch;
header("Location: /hub/profile.php?user=" . $userSearch);
}

if (isset($_POST['ownProfile'])) {
	header("Location: /hub/profile.php?user=" . $_SESSION['login_user']); // To make the URL look like the profile number.
	$_SESSION['searchValue']= $_SESSION['login_user']; // To actually get the profile result(Triggers the SQL lookup in DB.)
}
?>
</div>

