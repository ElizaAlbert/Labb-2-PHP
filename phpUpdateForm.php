<?php

include "includes/config.inc.php";
$id = 0;
if (isset($_GET['id'])) {
  $id = $_GET['id'];


  $sql = "SELECT * FROM members WHERE member_ID='$id'";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();

    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
    $payment = $row["payment"];
    $activity = $row["activity"];
    $team = $row["team"];

    echo

      "<html>
      <body>
        <form action='phpUpdateFormScript.php' method='post'>
          Medlems ID: $id<br>
          <input type='hidden' name='member_ID' value='$id'>
          Förnamn: <input type='text' name='first_name' value='$first_name'><br>
          Efternamn: <input type='text' name='last_name' value='$last_name'><br>
          <input type='hidden' name='payment' value='false'>
          Betalt: <input type='checkbox' name='payment' value='true'><br>
          Aktivitet: <input type='text' name='activity' value='$activity'><br>
          Lag: <input type='text' name='team' value='$team'><br>
          <input type ='submit'>
        </form>
        <form action='./index.php'>
          <input type='submit' value='Tillbaka' />
      </form>
      </body>
    </html>";
  } else {
    echo "Not Found";
  }
  $conn->close();
}
