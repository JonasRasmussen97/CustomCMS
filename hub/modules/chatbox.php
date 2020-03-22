<html>
<link rel="stylesheet" href="style.css">
<script src="js/jquery.vide.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<link rel="stylesheet" href="/hub/jq" />
<script src="hub/jquery/simplebar.js"></script>
<link rel="stylesheet" href="/hub/jquery/simplebar.css" />


    

<div id="chatboxFrame">
<div class="messageField">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   
<?php
if ($_SESSION['loggedin'] === true){
	 echo  "<input type='text' name='messageInput'>";
	 echo "<button type='submit' id='sendMessage' name='sendMessage'>Send</button>";
} else {
	echo "<input type='text' value=' Hello Guest, login to send a message.' name='messageInput' disabled>";
	echo "<button type='submit' name='sendMessage' disabled>Send</button>";
}
?>

</form> 





<div class="messageRecieved">
<?php 

$sql2 = "SELECT * FROM chatbox ORDER BY id DESC LIMIT 10";
	$result2 = $mysqli->query($sql2);
	while($row = mysqli_fetch_array($result2)) {
	 echo "<p><font size=2>[" . $row['date'] . "]" . "<a href='/hub/profile.php?user=$row[name]'><font color='#800909'>" . $row['name'] . ": </font></a>";
	 echo "<font color='#e9e9e9' size=2>" . $row['message'] . "</font></p>";
	}
?>
</div>
</div>
</div>



<?php
$date = date("m.d.y"); 
if (isset($_POST['sendMessage']) && ($_SESSION['loggedin'] === true)){
	$userID = $_SESSION['login_user'];
	@$chatboxmessage = htmlspecialchars($_POST['messageInput']);
	$sql = "INSERT INTO chatbox(name,message, date) VALUES('$userID','$chatboxmessage', '$date')";
	$result = $mysqli->query($sql);	
}

?>











































</html>