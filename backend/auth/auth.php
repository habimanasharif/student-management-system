<?php
// Check if the user is logged in
session_start();
$loggedIn = isset($_SESSION["email"]);
    if(!$loggedIn){// Redirect to login page or appropriate error page
    header("Location: login.php");
    exit();
    }