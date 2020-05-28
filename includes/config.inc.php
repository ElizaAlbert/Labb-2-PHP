<?php

/*********************** Database configuration for the login form (unnecessarry in this particular case but I did it for practice) ***********************/

/* File contains "inc" which only stands to for "includes", doesn't make any change. This file is placed in the "includes" map for organisation purposes, because this page will never be seen by the user. */

session_start(); /* Starts new or resumes existing session */

$user = "root"; /* Database User */
$pwd = "root"; /* Database Password */
$dbname = "svalan"; /* Database name */
$id = 0;

// Connecting to database
$conn = mysqli_connect("localhost", $user, $pwd, $dbname);

// Check for errors in connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL; /* Returns the error code from the last connection error, if any */
    exit;
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($conn, "DELETE FROM members WHERE member_id=$id");
    $_SESSION['message'] = "Address deleted!";
    header('location: ../index.php');
}
