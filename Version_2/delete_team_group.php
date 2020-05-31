<?php
require_once 'config/config.php';
if(empty($_SESSION['user_id']))
{
      header('location:logout.php'); 
}



	$select_query = mysqli_query($con, "DELETE FROM `teams` WHERE team_ID = '" . $_GET['id'] . "' ");

    $_SESSION['success'] = "Team and Group deleted successfully.";

    header('Location:team_group.php');
?>

















