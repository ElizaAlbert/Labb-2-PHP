<?php

$servername = "localhost:8889";
$username = "root";
$password = "root";

try {
  $conn = new PDO("mysql:host=$servername;dbname=labb2-php", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


$test = ''

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IK Svalan</title>
</head>

<body>
  //
</body>

</html>