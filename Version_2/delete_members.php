<?php
require_once 'config/config.php';
if(empty($_SESSION['user_id']))
{
      header('location:logout.php'); 
}



	$select_query = mysqli_query($con, "DELETE FROM `members` WHERE member_ID = '" . $_GET['id'] . "' ");

    $_SESSION['success'] = "Members deleted successfully.";

    header('Location:members.php');
?>







