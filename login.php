<?php
include "includes/config.inc.php";
?>
<html>

<head>
    <title>Login</title>
    <link href="assets/loginStyle.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Chelsea+Market&display=swap" rel="stylesheet">
</head>

<body>
    <style>
        /* GOOGLE FONT OF LOGIN TITLE */
        @import url('https://fonts.googleapis.com/css2?family=Chelsea+Market&family=Lobster+Two&display=swap');
    </style>
    <div class=" container">
        <form method="post" action="">
            <div id="div_login">
                <h1 style="font-family: 'Chelsea Market', cursive; font-family: 'Lobster Two', cursive; font-size: 50px">Login</h1>
                <div>
                    <label for="username" class="label"">Username:</label>
                    <input type=" text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Ex: admin..." />
                </div>
                <div>
                    <label for="password" class="label">Password:</label>
                    <input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Ex: admin..." />
                </div>
                <div>
                    <input type="submit" value="Login" name="but_submit" id="but_submit" />
                </div>
                <?php

                //  isset: Determine if a variable is declared and is different than NULL
                if (isset($_POST['but_submit'])) {

                    $uname = mysqli_real_escape_string($conn, $_POST['txt_uname']); // mysqli_real_escape_string: Escapes special characters in a string for use in an SQL statement, taking into account the current charset of the connection
                    $password = mysqli_real_escape_string($conn, $_POST['txt_pwd']);


                    if ($uname != "" && $password != "") { // If username & password fields are submitted empty

                        $sql_query = "SELECT count(*) AS cntUser FROM users WHERE username='" . $uname . "' AND PASSWORD='" . $password . "'";
                        $result = mysqli_query($conn, $sql_query); // Performs a query on the database
                        $row = mysqli_fetch_array($result); //  Fetch a result row as an associative, a numeric array, or both

                        $count = $row['cntUser'];

                        if ($count > 0) {
                            $_SESSION['uname'] = $uname;
                            header('Location: index.php'); // Sends user to index.php
                        } else {
                            echo "<p style='font-size: 20px; text-align: center; color: rgb(252, 0, 0);'> Invalid username and password! </p>";
                        }
                    }
                }
                ?>
            </div>
        </form>
    </div>
</body>

</html>