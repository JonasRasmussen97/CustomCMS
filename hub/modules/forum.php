<html>
<link rel="stylesheet" href="style.css">
<script src="js/jquery.vide.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>




<div class="forumcontent">
<?php

require_once("db_connection.php");
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$date = date("m.d.y");




if (isset($_POST['postNews'])){
$username = $_SESSION['login_user'];
$sql2 = "INSERT into forum_threads (id, title, message, postedby, date, type) VALUES ('','$_POST[topicTitle]', '$_POST[topicText]', '$username', '$date', 'News' ) ";
$result2 = $mysqli->query($sql2);
header("Location: ?page=news");
}

if (isset($_POST['replyNews'])){
$username = $_SESSION['login_user'];
$sql2 = "INSERT into forum_replies (message, postedby, date, type, replytitle) VALUES ('$_POST[topicText]', '$username', '$date', 'NewsReply', '' ) ";
$result2 = $mysqli->query($sql2);
header("Location: ?page=");
}


if (empty($_GET)) {
$sql = "SELECT * FROM forum";
$result = $mysqli->query($sql);

while($row = mysqli_fetch_array($result)) {
	if($row['visible'] == "true" && $row['type'] == "Container") {
	echo "<img src='" . $row['headerImage'] . "'</img>";
	} elseif($row['type'] == "Forum") {
		echo "<a href='?page=news'><b><p>" . $row['name'] . "</b></p></a>";
		echo "<font size='2px'><i>" . $row['description'] . "</i></font>"; 
}
}

echo "<img src='images/forumnews.png'></img>";
echo "<a href='?page=news'><p><b><font size=3>Test the forum</font></b></a>";
echo "<p><font size=2>Create anything you'd like in here. We are testing.</font></p>";
echo "<hr></hr>"; 

echo "<a href='?page=rules'><p><b><font size=3>Rules & Regulations</font></b></a>";
echo "<p><font size=2>Read before posting.</font></p>";

echo "<img src='images/forumcommunity.png'></img>";
echo "<a href='?page=introduction'><p><b><font size=3>Introductions</font></b></a>";
echo "<p><font size=2>New to the forum? Introduce yourself here!</font></p>";
echo "<hr></hr>";
echo "<a href='?page=general'><p><b><font size=3>General Chat</font></b></a>";
echo "<p><font size=2>Community Discussions.</font></p>";


echo "<img src='images/forumgames.png'></img>";
echo "<a href='?page=gamediscussion'><p><b><font size=3>Game Discussion</font></b></a>";
echo "<p><font size=2>Want to talk about games? This is the place.</font></p>";

echo "<a href='?page=gamedevelopment'><p><b><font size=3>Game Development</font></b></a>";
echo "<p><font size=2>Anything related to game development.</font></p>";

echo "<a href='?page=showroom'><p><b><font size=3>The Showroom</font></b></a>";
echo "<p><font size=2>Made your own game/asset? Show it here.</font></p>";

echo "<a href='?page=gamereleases'><p><b><font size=3>Game Releases</font></b></a>";
echo "<p><font size=2>Share something with the community.</font></p>";

echo "<img src='images/forumprogramming.png'></img>";
echo "<a href='?page=programming'><p><b><font size=3>Programming Languages</font></b></a>";
echo "<p><font size=2>Programming discussions.</font></p>";

echo "<a href='?page=tutorials'><p><b><font size=3>Tutorials</font></b></a>";
echo "<p><font size=2>Programming or computer tutorials.</font></p>";

echo "<a href='?page=programmingreleases'><p><b><font size=3>Programming Releases</font></b></a>";
echo "<p><font size=2>If you have an idea or made a program, share it here!</font></p>";

echo "<a href='?page=support'><p><b><font size=3>Support</font></b></a>";
echo "<p><font size=2>Got a programming issue? Post it here and ask for help.</font></p>";


echo "<img src='images/forumsupport.png'></img>";
echo "<a href='?page=feedback'><p><b><font size=3>Website Feedback</font></b></a>";
echo "<p><font size=2>We're always looking for feedback to improve the site.</font></p>";

echo "<a href='?page=techsupport'><p><b><font size=3>Technical Support</font></b></a>";
echo "<p><font size=2>Need help? Ask here.</font></p>";
} else {
?>	



<?php
	
	$sql = "SELECT * FROM forum_threads";
	$result = $mysqli->query($sql);
	
	
	if ($_GET['page'] === "news") {  // News forum setup.
	echo "<img src='images/forumnews.png'></img>";
	echo  "<button type='button' onclick=location.href='?page=createnews'>Create Thread</button>";
	while($row = mysqli_fetch_array($result)) {
	echo "<font size=2><hr><b>" . "<a href='?page=$row[id]'><img src='http://icons.iconarchive.com/icons/fatcow/farm-fresh/24/shape-group-icon.png'</img>" . htmlspecialchars($row['title']) . "</a></b><p>" . "Started by </font>" . $row['postedby'] . ", " . $row['date'];
	?>
	<div class="forumstats">
	<?php
	echo "Replies: " . $row['replies'] . " Views: " . $row['views'];
	?>
	
	</div>
	<?php
	}
	}
	?>
	

	
	<div class="forumtopic">
		<?php

	if ($_GET['page'] === "createnews" && ($_SESSION['loggedin'] === true)) { // What to show if ?page=createnews.
	?>
	 <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	 <?php
		echo  "<p>Title: <input type='text' name='topicTitle'></p>";
		echo  "<p><textarea name='topicText'></textarea></p>";
	 echo "<button type='submit' name='postNews'>Post</button>";
	} elseif ($_SESSION['loggedin'] === false && ($_GET['page'] === "createnews")) {
		echo "You need to login.";
	}
	
	
	?>
	</form>
	</div>
	<?php
	$sql = "SELECT * FROM forum_threads WHERE id='$_GET[page]'";
	$result = $mysqli->query($sql);
	$row = mysqli_fetch_array($result);
	
	$sql2 = "SELECT * from accounts WHERE username='$row[postedby]'"; 
	$result2 = $mysqli->query($sql2);
	$row2 = mysqli_fetch_array($result2);
	
	?>
	<?php
	if ($_GET['page'] === $row['id']) {
	?>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class="forumthreaduser">
		<?php
		echo "<font size=3><p><b><a href='/hub/profile.php?user=$row[postedby]'>" . $row['postedby'] . "</a></b><p>" . $row2['title'] . "</p><img src='" . $row2['profilepicture'] . " 'width=100 height=80</p></font>";
		echo "<p><img src='$row2[rankbar]'</img></p>";
		echo "<p><font-size=1>Join Date: 	<i>" . $row2['joindate'] . "</font></p></i>";
		echo "Posts: </hr>";
		echo "<vr>";
		?>
		</div>
		<div class="forummessage">
		<?php
		echo "" . "<img src='http://icons.iconarchive.com/icons/fatcow/farm-fresh/24/shape-group-icon.png'</img><b>" . $row['title'] . "</b></p>" . $row['message'] . "</hr>";
		$sql = "SELECT * FROM forum_replies";
		$result = $mysqli->query($sql);


		?>
		</div>
		
		
		<div class="forumreplies">
		<?php
		while($row = mysqli_fetch_array($result)) {
			echo "<hr><p>" . $row['message'] . "</p>";
			echo "<p>By, <a href='/hub/profile.php?user=$row[postedby]'>" . $row['postedby'] . "</hr></p></a>";
			
		
		}
		?>
		</div>
		<?php
		echo  "<button type='button' onclick=location.href='?page=replynews'>Reply</button>";
		$sql = "UPDATE forum_threads SET views = views + 1, replies = replies + 1 WHERE id='$_GET[page]'";
		$result = $mysqli->query($sql);

		
	}
	?>
	</form>
	
	<?php
	
	if ($_GET['page'] === "replynews" && ($_SESSION['loggedin'] === true)) { // What to show if ?page=replynews.
	?>
	 <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	 <?php
		echo  "<p><textarea name='topicText'></textarea></p>";
	 echo "<button type='submit' name='replyNews'>Post</button>";
	} elseif ($_SESSION['loggedin'] === false && ($_GET['page'] === "replynews")) {
		echo "You need to login.";
	}
	?>
	</form>
	
	<?php
	
	
	
	// News section of the forum ^
	
	
	
	
	
	
}
?>

</div>































</html>