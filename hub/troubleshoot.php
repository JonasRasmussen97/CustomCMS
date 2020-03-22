
 <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 <button type="submit" name="submit" id="login_button" onclick="">Log in!</button> 
</form>




<?php
if (isset($_POST['submit'])){
echo "Test";
}
?>
