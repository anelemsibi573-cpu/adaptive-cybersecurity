<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: ../students/login.php");
    exit();
}

include "../includes/db_connect.php";

$user_id = $_SESSION["user_id"];

$sql_role = "SELECT role FROM users WHERE id = ?";

$stmt_role = mysqli_prepare($conn, $sql_role);

mysqli_stmt_bind_param($stmt_role, "i", $user_id);

mysqli_stmt_execute($stmt_role);

$result_role = mysqli_stmt_get_result($stmt_role);

$user = mysqli_fetch_assoc($result_role);

if ($user["role"] != "admin") {
    header("Location: ../students/dashboard.php");
    exit();
}

$sql = "SELECT id, username, email, role FROM users";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Manage Users</h1>

<nav>
    <a href="admin_dashboard.php">Dashboard</a> |
    <a href="manage_users.php">Manage Users</a> |
    <a href="manage_questions.php">Manage Questions</a> |
    <a href="view_results.php">View Results</a> |
    <a href="../students/logout.php">Logout</a>
</nav>

<h2>Registered Users</h2>

<table>

    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
    </tr>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
    ?>

        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["username"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["role"]; ?></td>
        </tr>

    <?php
    }
    ?>

</table>

<br>

<a href="admin_dashboard.php">Back to Admin Dashboard</a>

</body>
</html>