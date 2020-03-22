<!-- REGISTER PAGE!?!?!?!?!?!?!? </!-->

<?php
include 'includes/header.php';
?>


<div id="content">
<?php
include 'modules/chatbox.php';
?>
<div class="usercp">
<div class="inputboxes">
<form method="POST">
<font color='black'>Username*:<p>
<input type="text" name="user_register"></p>
E-mail*:<p>
<input type="text" name="email_register"></p>
Password*:<p>
<input type="text" name="pass_register"></p>
Areas marked with asterisk (*) need to be filled. 
<button type="submit" name="registersubmit">Register</button></font>
</form>
</div>
</div>
<?php 
$joindate = date("F j, Y");
require_once("db_connection.php");
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$ip = $_SERVER['REMOTE_ADDR'];

 if(isset($_POST['registersubmit'])) {	 
@$usernameregister = htmlspecialchars($_POST['user_register']);
@$email = htmlspecialchars($_POST['email_register']);
@$passwordregister = password_hash($_POST['pass_register'], PASSWORD_DEFAULT);

if(($usernameregister == '')) {
	echo "You need to enter a username.";
} elseif($email == '') {
	echo "You need to enter a email.";
}elseif($passwordregister == '') {
	echo "You need to enter a password.";
} else {
$sql = "INSERT INTO accounts(id,username,email,password,rank,title,rankbar,level,profilepicture,ip, joindate) VALUES('session_id','$usernameregister','$email','$passwordregister','Regular','','images/ranks/regular.png',0,'images/defaultpic.png','$ip', '$joindate')";
$result = $mysqli->query($sql);
if (!$result) {
    echo "Username already taken."; // Check if the sql query is working.
	printf("Connect failed: %s\n", $mysqli->error);
} else {
	echo "Account has been succesfully created.";	
}
}



}
include 'includes/footer.php';
?>


</div>

<?php
include 'includes/navigation.php';
?>







































</div>
</html>