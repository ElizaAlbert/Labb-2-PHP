<?php
require_once 'config/config.php';
$errors =  array();
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username)) 
    {
        array_push($errors, "Username is required");
    }
    if (empty($password)) 
    {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
        $query = "SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."' LIMIT 1 ";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 1) {
            $getrecord = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $getrecord['id'];
            $_SESSION['username'] = $username;
            header('location:dashboard.php'); 
        } 
        else 
        {
            array_push($errors, "Username and Password wrong!");
        }
    }
}

?>

<html>
<head>
    <title>Login</title>
    <link href="assets/loginStyle.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Chelsea+Market&display=swap" rel="stylesheet">
     <link rel="shourtcut icon" type="image/png" href="audio/favicon.png">
</head>

<body id="login">
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
                    <input type=" text" class="textbox" name="username" placeholder="Ex: admin..." />
                </div>
                <div>
                    <label for="password" class="label">Password:</label>
                    <input type="password" class="textbox" name="password" placeholder="Ex: admin..." />
                </div>
                <div>
                    <input type="submit" value="Login" name="submit"/>
                </div>
               
            </div>
        </form>
    </div>
</body>

</html>