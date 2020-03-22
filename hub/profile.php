
<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if ($_SESSION['loggedin'] === true) {
include 'includes/headerlogin.php';
} else {
	include 'includes/header.php';
}
?>
<div id="content">
<?php
include 'modules/chatbox.php';
?>


<div class="profile">
<div class="usercp">

<?php 
$userInput = $_GET['user']; // Gets the 'user' value from the URL.	
$sql = "SELECT id, username, rank, title, rankbar, level, profilepicture, achievements, lastonline FROM accounts WHERE username ='$userInput'";
$result = $mysqli->query($sql);
if(!$result->num_rows == 1){	
echo "Profile does not exist!"; // VIRKER IKKE FORDI DEN IKKE ER I USERCP DIV.
} else {
$row = mysqli_fetch_array($result);
echo "<center><img src='images/profilebg3.png' style=margin-top:px></center>";
?>
</div>
<div class="profilepicture">
<?php
echo "<img src='$row[profilepicture]'< width=110px height=121px style='margin-left: -150px; margin-top:px;' </img>";
?>
</div>


<div class="profiletext1">
<?php
echo "<b><font color=#cacccf><p><font size=4>" . $row['username'] . "'s Profile <font size=3> - <i>" . $row[3]."</center></font></p></b></i>";
echo "<font size=2><p><img src=''</img><b>Level:</b> " . $row['level'];
echo "<font size=2><p><img src=''</img><b>Rank(s): </b><img src='$row[rankbar]'</img></p>";
echo "<font size=2><b><img src=''</img>Achievements: </b>" . $row['achievements'];
echo "<p><img src=''><b>Last seen:</b> " . $row['lastonline'] . "</font>";
}

?>

</div>
</div>
</div>


<?php
include 'includes/navigation.php';
?>



































