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
if($_SESSION['loggedin'] === false) {
	echo "Please log in to see this page.";
} else {
	include 'modules/chatbox.php';
}
include 'modules/news.php';
include 'includes/footer.php';
?>
</div>

<?php
include 'includes/navigation.php';
?>








































