<link rel="stylesheet" href="style.css">
<script src="js/jquery.vide.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>


<div class="news">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<!DOCTYPE HTML>
<?php

require_once("db_connection.php");
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$sql = "SELECT * FROM news ORDER BY id DESC LIMIT 3;";
$result = $mysqli->query($sql);
while($row = mysqli_fetch_array($result)) {
echo "<font color='#2284c2' size=4><p><img src='images/chat.png'> " . $row['title'] . "</p></font>";
echo "<p><font color='#982c2c' size=2>Posted " . $row['date'] . "</font></p>";
echo "<font color='#8b8b8b' size=2>" . $row['text'] . "</font>";
echo "<p>By <font color='#a6a735' size=2> " . "<a href='/hub/profile.php?user=$row[postedby]'>" . $row['postedby'] . "</a></font></p>";
?>
<hr></hr>
<?php
}
if ($_SESSION['loggedin'] === true) {
$sql = "SELECT rank FROM accounts where username = '$_SESSION[login_user]'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);
if ($row['rank'] === "Administrator") {
echo  "Title: <input type='text' name='newsTitle'>";
echo  "Text: <textarea type='text' name='newsText'></textarea>";
echo "<button type='submit' name='addNews1'>Post</button>";
}
}
?>
</p>
</form>
<?php
$date = date('Y-m-d H:i:s');
if (isset($_POST['addNews1']) && ($row['rank'] === 'Administrator')) {
	$sql = "INSERT INTO news(postedby,title,text, date) VALUES('$_SESSION[login_user]','$_POST[newsTitle]','$_POST[newsText]', '$date')";
	$result = $mysqli->query($sql);	
	
}
?>




</div>

































</html>