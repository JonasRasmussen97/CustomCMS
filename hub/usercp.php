<?php
session_start();
if ($_SESSION['loggedin'] === false) {
include 'includes/header.php';
} else {
include 'includes/headerlogin.php';
}

?>

<div id="content">
<?php
include 'modules/chatbox.php';
?>
<div class="usercp">

<?php 
if ((empty($_SESSION['login_user']))) {
	echo "You need to login to access your user control panel.";
} else {
?>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<p><b><font color="black">Control panel</p></font></b>
  <p>Username:</p>
  <p><input type="text" name="newNameInput">
   <button type="submit" name="changeName">Change</button>
   
<p>E-mail:</p>
  <p><input type="text" name="newEmailInput">   
   <button type="submit" name="changeEmail">Change</button>
   
   <p>Password:</p>
  <p><input type="text" name="newPasswordInput">   
   <button type="submit" name="changePassword">Change</button> 
   
     <p>Title:</p>
  <p><input type="text" name="newTitleInput">   
   <button type="submit" name="changeTitle">Change</button> 


    <p>Profile Picture(Use link 100x100):</p>
  <p><input type="text" name="newPictureInput">   
   <button type="submit" name="changePicture">Change</button> 
</form> 
<?php 
}

$currentName = @$_SESSION['login_user'];
if (isset($_POST['changeName'])) {
	$newNameInput = $_POST['newNameInput'];
	if (empty($newNameInput)) {
		echo "You need to enter a username.";
	} else {
   $sql = "UPDATE accounts SET username='$newNameInput' WHERE username='$currentName' LIMIT 1";
$result = $mysqli->query($sql);
if (!$result) {
	echo "Username is taken.";
} else {
echo "Your username has been changed to: " . $newNameInput; 
$_SESSION['login_user'] = htmlspecialchars($newNameInput);
}
}
}

if (isset($_POST['changeEmail'])) {
	$newEmailInput = htmlspecialchars($_POST['newEmailInput']);
	if (empty($newEmailInput)) {
		echo "You need to enter an email.";
	} else {
   $sql = "UPDATE accounts SET email='$newEmailInput' WHERE username='$currentName' LIMIT 1";
$result = $mysqli->query($sql);
echo "E-mail has been updated.";
}
}
if (isset($_POST['changePassword'])) {
	$newPasswordInput =(htmlspecialchars(password_hash($_POST['newPasswordInput'], PASSWORD_DEFAULT)));
	if (empty($newPasswordInput)) {
		echo "Your need to enter a password.";
	} else {
   $sql = "UPDATE accounts SET password='$newPasswordInput' WHERE username='$currentName' ";
$result = $mysqli->query($sql);
echo "Your password has been changed."; 
}
}

if (isset($_POST['changeTitle'])) {
	$newTitleInput = htmlspecialchars($_POST['newTitleInput']);
   $sql = "UPDATE accounts SET title='$newTitleInput' WHERE username='$currentName' LIMIT 1";
$result = $mysqli->query($sql);
echo "Your title has been changed to: " . $newTitleInput; 
}

if (isset($_POST['changePicture'])) {
	$newPictureInput = htmlspecialchars($_POST['newPictureInput']);
if (empty($newPictureInput)) {
   $sql = "UPDATE accounts SET profilepicture='images/defaultpic.png' WHERE username='$currentName'";
   $result = $mysqli->query($sql);
   echo "Your profile picture has been set to default.";
} else {	
   $sql = "UPDATE accounts SET profilepicture='$newPictureInput' WHERE username='$currentName'";
   $result = $mysqli->query($sql);
echo "Your profile picture has been changed to: <img src='" . $newPictureInput . "' width=100px height=100px </img>"; 
}
}



include 'includes/footer.php';
?>
</div>
</div>

<?php
include 'includes/navigation.php';


?>



































</div>
</html>