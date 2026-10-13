<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: ../students/login.php");
    exit();
}

include "../includes/db_connect.php";

$user_id = $_SESSION["user_id"];

$sql = "SELECT role FROM users WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $user_id);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$user = mysqli_fetch_assoc($result);

if ($user["role"] != "admin") {
    header("Location: ../students/dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Adaptive Cybersecurity - Admin Dashboard</h1>

<nav>
    <a href="admin_dashboard.php">Dashboard</a> |
    <a href="manage_users.php">Manage Users</a> |
    <a href="manage_questions.php">Manage Questions</a> |
    <a href="view_results.php">View Results</a> |
    <a href="../students/logout.php">Logout</a>
</nav>

<h2>Administrator Dashboard</h2>

<div class="dashboard-container">

    <div class="dashboard-card">
        <h3>User Management</h3>
        <p>View and manage registered users.</p>
        <a href="manage_users.php">Manage Users</a>
    </div>

    <div class="dashboard-card">
        <h3>Question Management</h3>
        <p>Add, edit and manage cybersecurity assessment questions.</p>
        <a href="manage_questions.php">Manage Questions</a>
    </div>

    <div class="dashboard-card">
        <h3>View Results</h3>
        <p>View cybersecurity assessment and training performance.</p>
        <a href="view_results.php">View Results</a>
    </div>

</div>

</body>
</html>