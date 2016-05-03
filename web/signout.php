<?php    
         session_start();
         session_destroy();
         include 'initSite.php';
         header('location:loginpage.php');
?>