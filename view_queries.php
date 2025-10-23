<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}
include("connect.php");

$result = $conn->query("SELECT * FROM queries ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Submitted Queries</title>
</head>
<body>
    <h2>Submitted Queries</h2>
    <a href="admin_dashboard.php">← Back to Dashboard</a><br><br>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Message</th><th>Submitted On</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo htmlspecialchars($row["name"]); ?></td>
            <td><?php echo htmlspecialchars($row["email"]); ?></td>
            <td><?php echo htmlspecialchars($row["message"]); ?></td>
            <td><?php echo $row["created_at"]; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
