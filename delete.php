<!-- DELETE BUTTON -->

<?php

require('includes/config.inc.php');
$id = $_REQUEST['member_ID'];
$query = "DELETE FROM members WHERE member_ID=$id";
$result = mysqli_query($conn, $query) or die();
header('Location: index.php');

exit();
?>