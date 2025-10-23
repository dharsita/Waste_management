<?php
session_start();
include("connect.php");

$username = $_POST['username'];
$password = $_POST['password'];

// Example: Replace with your actual admin credentials or DB check
if ($username === "admin" && $password === "admin123") {
    $_SESSION['admin_logged_in'] = true;
    header("Location: admin_dashboard.php");
} else {
    echo "Invalid credentials. <a href='admin_login.php'>Try again</a>";
}
?>
