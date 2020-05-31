<?php
    require_once 'config/config.php';
if(empty($_SESSION['user_id']))
{
      header('location:logout.php'); 
}


    session_destroy();
    header('location:index.php'); 
?>