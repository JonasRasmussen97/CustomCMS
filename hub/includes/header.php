<!DOCTYPE html> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
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
   <button type="submit" name="submit" id="login_button" onclick="">Log in</button> 
   <button type="button" onclick="location.href='/hub/register.php'">Register</button>
</form> 



<?php 
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(!isset($_SESSION['loggedin']) && empty($_SESSION['loggedin'])) { // Checks if the user is logged in upon visiting index site. 
$_SESSION['loggedin'] = false;
}
	require_once("db_connection.php");
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	// Check connection
	if ($mysqli->connect_errno) { // Return error from last attempted connection 
		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
		exit();
	}	
	

	@$username = $_POST['username']; // @ Supresses errors.
	@$password = $_POST['password']; // @ Supresses errors.
	$sql = "SELECT password FROM accounts WHERE username LIKE '$username'";
	$hash = $mysqli->query($sql);
	$row = mysqli_fetch_array($hash);
	
	@$passwordverify = password_verify($_POST['password'], $row['password']); // Same as above.
	$date = date("F j, Y, g:i a");      
	$lastip = $_SERVER['REMOTE_ADDR'];
	
	
	
	$sql = "SELECT password from accounts WHERE username LIKE '$username'";
	$hash = $mysqli->query($sql);
	
	
	$sql = "SELECT * from accounts WHERE username LIKE '{$username}' LIMIT 1";
	$result = $mysqli->query($sql);
	if (isset($_POST['submit'])){
	if(($username == '') || ($password == '')) { // Check if username or password input is empty.
		echo "<p>Username or password not entered.</p>";
	} else {
	if($result->num_rows == 1 && $passwordverify){
		echo "<p>Logged in successfully</p>";
		$_SESSION['login_user']= $username;
		$_SESSION['login_pass']= $password;
		$_SESSION['loggedin'] = true;
		$sql = "UPDATE accounts SET lastonline='$date', lastip='$lastip' WHERE username='$username'";
		$result = $mysqli->query($sql);
		header("Location: user.php");
		exit;
			"INSERT INTO news(name,title,text) VALUES('$_SESSION[login_user]','$_POST[newsTitle]','$_POST[newsText]')";
		
	} else {
			echo "<p>Invalid username/password combination</p>";
	}	
	}
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
?>
</div>
