<?php
include "includes/config.inc.php";

// Adding all members to array. 
$members = [];
foreach ($conn->query("SELECT * FROM members") as $row) {
  $members[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IK Svalan</title>
  <link rel="stylesheet" href="./assets/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
  <h1>IK Svalan medlemsregister</h1>

  <!--------------- 
  Hela table skall bytas ut till input fält och knapparna bytas ut till en spara knapp vid varje rad. kommer bli snyggare och bättre
  --------------->
  <table>
    <tr>
      <th>Nr</th>
      <th>Förnamn</th>
      <th>Efternamn</th>
      <th>Betald</th>
      <th>Aktivitet</th>
      <th>Lag</th>
      <th>Ta bort</th>
      <th>Redigera</th>
    </tr>
    <?php
    foreach ($members as $member) {
      echo "<tr>";
      echo "<td>" . $member["member_ID"] . "</td>";
      echo "<td>" . $member["first_name"] . "</td>";
      echo "<td>" . $member["last_name"] . "</td>";
      echo "<td>" . $member["payment"] . "</td>";
      echo "<td>" . $member["activity"] . "</td>";
      echo "<td>" . $member["team"] . "</td>";
      echo "<td><form method='post' action=''><input class='b-red' type='submit' name='del' value='X'></form></td>";
      echo "<td><form method='post' action=''><input class='b-green' type='submit' name='edit' value='V'></form></td>";
      echo "</tr>";
    }
    ?>

  </table>


  <!------------------------- LOGIN  ------------------------->

  <?php

  // Check user logged in or not
  if (!isset($_SESSION['uname'])) {
    header('Location: index.php');
  }

  // if logout button pressed, destroy session and take user back to login.php
  if (isset($_POST['but_logout'])) {
    session_destroy(); // destroys all of the data associated with the current session.
    header('Location: login.php'); //Sends user back to login.pho
  };

  ?>

  <form method='post' action="">
    <input type="submit" value="Logout" name="but_logout">
  </form>

</body>

</html>