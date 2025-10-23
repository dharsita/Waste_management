<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}
include("connect.php");

// Count queries
$queryCount = $conn->query("SELECT COUNT(*) AS total FROM queries")->fetch_assoc()['total'];

// Dummy counts for now
$workers = 10;
$dustbins = 25;
$trucks = 5;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 12px;
            padding: 20px;
            margin: 20px;
            text-align: center;
            display: inline-block;
            width: 200px;
            box-shadow: 2px 2px 8px gray;
        }
    </style>
</head>
<body>
    <h1>Welcome Admin</h1>
    <div class="card">Total Queries: <strong><?php echo $queryCount; ?></strong></div>
    <div class="card">Total Workers: <strong><?php echo $workers; ?></strong></div>
    <div class="card">Total Dustbins: <strong><?php echo $dustbins; ?></strong></div>
    <div class="card">Total Trucks: <strong><?php echo $trucks; ?></strong></div>

    <br><br>
    <a href="view_queries.php">View Submitted Queries</a> | 
    <a href="admin_logout.php">Logout</a>
</body>
</html>
