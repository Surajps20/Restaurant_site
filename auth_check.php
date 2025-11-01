<?php
session_start();

// If the admin is not logged in, redirect them to the login page
if (!isset($_SESSION['admin_loggedin']) || $_SESSION['admin_loggedin'] !== true) {
    header("location: admin_login.php");
    exit;
}
?>