<?php 
session_start();
if ($_SESSION['loggedin'] === true) {
include 'includes/headerlogin.php';
} else {
	include 'includes/header.php';
}

$dbhandle = mysql_connect(DB_HOST, DB_USER, DB_PASS) 
or die("Unable to connect to MySQL");
$selected = mysql_select_db("php",$dbhandle) 
or die("Could not select databasename");

?>

<div id="content">
<div class="usercp">

 
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Level up:
   <button type="submit" name="level" id="login_button" onclick="startGame()">Click me!</button> 
</form>



</div>
</div>


		

<?php
include 'includes/navigation.php';
if (isset($_SESSION)) {
$currentName = $_SESSION['login_user'];
if (isset($_POST['level'])) {
$sql = "UPDATE accounts SET level=level + 1 WHERE username='$currentName' LIMIT 1";
$result = $mysqli->query($sql);
}
}
?>

























