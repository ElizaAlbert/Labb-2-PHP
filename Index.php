<?php

//turn on php error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "includes/config.inc.php";

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
  <link rel="stylesheet" href="./assets/loginStyle.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="https://fonts.googleapis.com/css2?family=Chelsea+Market&display=swap" rel="stylesheet">

</head>

<body>
  <h1>IK Svalan medlemsregister</h1>

  <!-- ADD MEMBERS -->

  <button style="background-color: red;" onclick="location.href='includes/config.inc.php?del=<?php echo $row['member_ID'] ?>'">Radera</button>
  <p><a href="add.php">Insert New Record</a></p>

  <!--------------- TABLE to list all members on site and options to edit values and save form --------------->


  <table>
    <tr>
      <th>Nr</th>
      <th>Förnamn</th>
      <th>Efternamn</th>
      <th>Betald</th>
      <th>Aktivitet</th>
      <th>Lag</th>
      <th>Redigera</th>
      <th>Delete</th>
    </tr>

    <?php

    //Saves array information for easy access.
    foreach ($members as $member) {
      $member_id = $member["member_ID"];
      $first_name = $member["first_name"];
      $last_name = $member["last_name"];
      $payment = $member["payment"];
      $activity = $member["activity"];
      $team = $member["team"];

    ?>

    <?php
    }

    ?>
    <tbody>
      <!-- RESULTS outprints info such as: current_field, field_count, lengths and num_rows -->
      <?php $results = mysqli_query($conn, "SELECT * FROM members");
      while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
          <td><input type="text" name="member_ID" value="<?php echo $row['member_ID']; ?>"></td>
          <td><input type="text" name="first_name" value="<?php echo $row['first_name']; ?>"></td>
          <td><input type="text" name="last_name" value="<?php echo $row['last_name']; ?>"></td>
          <td><input type="text" name="payment" value="<?php echo $row['payment']; ?>"></td>
          <td><input type="text" name="activity" value="<?php echo $row['activity']; ?>"></td>
          <td><input type="text" name="team" value="<?php echo $row['team']; ?>"></td>
          <td> <button style="background-color: green;" onclick="location.href='./phpUpdateForm.php?id=<?php echo $row['member_ID'] ?>'">Ändra</button>
          <td>
            <!------------------------------- DELETE BUTTON --------------------------------->
            <button style="background-color: red;" onclick="location.href='includes/config.inc.php?del=<?php echo $row['member_ID'] ?>'">Radera</button>
          </td>
        </tr>
      <?php  }  ?>
    </tbody>
  </table>


  <!------------------------------------------ LOGIN  ------------------------------------------>

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

  <form method='POST' action="">
    <input id="logout_but" type="submit" value="Logout" name="but_logout">
  </form>



</body>

</html>