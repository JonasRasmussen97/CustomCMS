<script type="text/javascript">
$(document).ready(function() {
// Tooltip only Text
$('.masterTooltip').hover(function(){
        // Hover over code
        var title = $(this).attr('title');
        $(this).data('tipText', title).removeAttr('title');
        $('<p class="tooltip"></p>')
        .text(title)
        .appendTo('body')
        .fadeIn('slow');
}, function() {
        // Hover out code
        $(this).attr('title', $(this).data('tipText'));
        $('.tooltip').remove();
}).mousemove(function(e) {
        var mousex = e.pageX + 20; //Get X coordinates
        var mousey = e.pageY + 10; //Get Y coordinates
        $('.tooltip')
        .css({ top: mousey, left: mousex })
});
});
</script>
<div id="seperatorlevel">
<?php 
require_once("db_connection.php");
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
?>



<?php
// Quest scripting.
$quests[1] = false;
$quests[2] = false;
$quests[3] = false;
$quests = array("Quest1", "Quest2", "Quest3");
if ($_SESSION['loggedin'] === true) {
	$quests[1] = true;
	$result = $mysqli->query($sql);
}



if ($quests[1] === true) {
$sql = "SELECT title, tooltip, image FROM quests WHERE id > 1 LIMIT 3";
echo "You have recieved 10 experience points for completing a quest.";
} else {
	$sql = "SELECT title, tooltip, image FROM quests LIMIT 3";
}
$result = $mysqli->query($sql);
echo "<p><b>YOUR DAILY <font color='#cb541a'>QUESTS.</b></p>";
while($row = mysqli_fetch_array($result)) {
echo "<img src='$row[image]' hspace=5 title='$row[tooltip]' class='masterTooltip'>";
}
?>
</div>
</div>