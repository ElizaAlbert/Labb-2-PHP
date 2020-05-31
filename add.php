<?php

//turn on php error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "includes/config.inc.php";

$status = "";
if (isset($_POST['new']) && $_POST['new'] == 1) {
    $first_name = $_REQUEST['first_name'];
    $last_name = $_REQUEST['last_name'];
    $payment = $_REQUEST["payment"];
    $activity = $_REQUEST["activity"];
    $team = $_REQUEST["team"];
    $ins_query = "INSERT INTO members (first_name, last_name, payment, activity, team) VALUES ('$first_name','$last_name','$payment','$activity', '$team')";
    mysqli_query($conn, $ins_query) or die();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Add New Member</title>

</head>

<body>
    <div class="form">

        <div>
            <h1>Insert New Record</h1>
            <form name="form" method="post" action="index.php">
                <input type="hidden" name="new" value="1" />
                <p><input type="text" name="first_name" placeholder="Enter Name" required /></p>
                <p><input type="text" name="last_name" placeholder="Enter Last Name" required /></p>
                <p><input type="text" name="payment" placeholder="Membership paid?" /></p>
                <p><input type="text" name="activity" placeholder="Activities" /></p>
                <p><input type="text" name="team" placeholder="Team" /></p>
                <p><input name="submit" type="submit" value="Submit" /></p>
            </form>
            <br /><br /><br /><br />

        </div>
    </div>
</body>

</html>