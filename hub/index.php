

<?php
include 'includes/header.php';
if ($_SESSION['loggedin'] === true) {
header("Location: user.php");
}

?>



<div id="content">
<?php
include 'modules/chatbox.php';
include 'modules/news.php';
include 'includes/footer.php';
?>
</div>



<?php
include 'includes/navigation.php'; 
?>


























