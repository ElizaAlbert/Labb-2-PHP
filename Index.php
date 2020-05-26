<?php

$servername = "localhost:8889";
$username = "root";
$password = "root";


$conn = new PDO("mysql:host=$servername;dbname=labb2-php", $username, $password);


$members = [];
foreach ($conn->query("SELECT * FROM members") as $row) {
  $members[] = $row;
}



// $sth = $conn->prepare($members);
// $sth->execute()



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
      echo "<td>" . $member[0] . "</td>";
      echo "<td>" . $member[1] . "</td>";
      echo "<td>" . $member[2] . "</td>";
      echo "<td>" . $member[3] . "</td>";
      echo "<td>" . $member[4] . "</td>";
      echo "<td>" . $member[5] . "</td>";
      echo "<td><button type='button'><i class='material-icons'>clear</i></button></td>";
      echo "<td><button type='button'><i class='material-icons'>add_circle_outline</i></button></td>";
      echo "</tr>";
    }


    ?>
  </table>

</body>

</html>