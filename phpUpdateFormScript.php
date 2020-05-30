<?php

include "includes/config.inc.php";

$member_id = $_POST["member_ID"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$payment = $_POST["payment"];
$activity = $_POST["activity"];
$team = $_POST["team"];




if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE members SET 
        first_name='$first_name',
        last_name='$last_name',
        payment='$payment',
        activity='$activity',
        team='$team'
        where member_ID='$member_id'";

if ($conn->query($sql) === TRUE) {
  echo "Records updated: " . $member_id . "-" . $first_name . "-" . $last_name . "-" . $payment . "-" . $activity . "-" . $team;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//Refresh page and redirects to index.php for main memberlist
header("refresh:3;url=./index.php");
echo "<br> Du kommer automatiskt tillbaka till första sidan om 3 sekunder";
$conn->close();
