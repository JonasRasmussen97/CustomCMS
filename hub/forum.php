
<?php 
session_start();
if ($_SESSION['loggedin'] === true) {
include 'includes/headerlogin.php';
} else {
include 'includes/header.php';
}

?>

<div id="content">
<?php
include 'modules/chatbox.php';
include 'modules/forum.php';
include 'includes/footer.php';

?>
</div>

<?php
include 'includes/navigation.php';
?>


























