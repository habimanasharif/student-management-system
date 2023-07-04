<?php
// Check if the user is logged in
$loggedIn = isset($_SESSION["user_email"]);
    if(!$loggedIn){// Redirect to login page or appropriate error page
    header("Location: login.php");
    exit();
    }