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
$sql = "SELECT 
            users.username,
            users.email,
            security_profiles.security_score,
            security_profiles.risk_level,
            security_profiles.training_score,
            security_profiles.training_completed,
            security_profiles.phishing_score,
            security_profiles.phishing_pretest_score
        FROM users
        LEFT JOIN security_profiles
        ON users.id = security_profiles.user_id";

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Results</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Adaptive Cybersecurity - View Results</h1>

<nav>
    <a href="admin_dashboard.php">Dashboard</a> |
    <a href="manage_users.php">Manage Users</a> |
    <a href="manage_questions.php">Manage Questions</a> |
    <a href="view_results.php">View Results</a> |
    <a href="../students/logout.php">Logout</a>
</nav>

<h2>User Performance Results</h2>

<table>

    <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Security Score</th>
        <th>Risk Level</th>
        <th>Training Score</th>
        <th>Training Status</th>
        <th>Phishing Awareness</th>
        <th>Phishing Pre-Test</th>
        <th>Improvement</th>
    </tr>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
    ?>

        <tr>
            <td><?php echo $row["username"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td>
    <?php
    echo $row["security_score"] !== null ? $row["security_score"] . " / 100" : "0 / 100";
    ?>
</td>

<td>
    <?php
    echo $row["risk_level"] !== null ? $row["risk_level"] : "Not Assessed";
    ?>
</td>

<td>
    <?php
    echo $row["training_score"] !== null ? $row["training_score"] . " / 100" : "0 / 100";
    ?>
</td>
            <td>
                <?php
                if ($row["training_completed"] == 1) {
                    echo "Completed";
                } else {
                    echo "Not Completed";
                }
                ?>
            </td>
            

            <td>
    <?php
    echo $row["phishing_score"] !== null ? $row["phishing_score"] . " / 100" : "0 / 100";
    ?>
</td>
<td>
    <?php
    echo $row["phishing_pretest_score"] !== null ? $row["phishing_pretest_score"] . " / 100" : "0 / 100";
    ?>
</td>
<td>
    <?php
    if ($row["phishing_score"] !== null && $row["phishing_pretest_score"] !== null) {
        echo ($row["phishing_score"] - $row["phishing_pretest_score"]) . " percentage points";
    } else {
        echo "Not Assessed";
    }
    ?>
</td>
        </tr>

    <?php
    }
    ?>

</table>

</body>
</html>