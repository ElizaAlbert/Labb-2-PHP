<?php
include "includes/config.inc.php";

// Check user login or not
if (!isset($_SESSION['uname'])) {
  header('Location: index.php');
}

// logout 
if (isset($_POST['but_logout'])) {
  session_destroy(); // destroys all of the data associated with the current session.
  header('Location: login.php'); //Sends user back to login.pho
}
?>
<!doctype html>
<html>

<head></head>

<body>
  <h1>IK Svalan</h1>
  <form method='post' action="">
    <input type="submit" value="Logout" name="but_logout">
  </form>
</body>

</html>