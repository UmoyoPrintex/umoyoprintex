<?php 
    //Include constants for SITEURL
    include('../config/constants.php');

    //1. Destroy the session
    session_destroy();//unsets $_SESSIOn['user']

    //2. redirect to login page
    header('location:'.SITEURL.'admin/login.php');
?>