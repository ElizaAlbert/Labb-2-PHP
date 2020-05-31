<?php
require_once 'config/config.php';
if(empty($_SESSION['user_id']))
{
      header('location:logout.php'); 
}



	$select_query = mysqli_query($con, "DELETE FROM `users` WHERE id = '" . $_GET['id'] . "' ");

    $_SESSION['success'] = "User deleted successfully.";

    header('Location:users.php');
?>

















