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

$sql = "SELECT id, question_text, option_a, option_b, option_c, option_d, correct_answer
        FROM questions";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Questions</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Manage Questions</h1>

<nav>
    <a href="admin_dashboard.php">Dashboard</a> |
    <a href="manage_users.php">Manage Users</a> |
    <a href="manage_questions.php">Manage Questions</a> |
    <a href="view_results.php">View Results</a> |
    <a href="../students/logout.php">Logout</a>
</nav>

<h2>Cybersecurity Assessment Questions</h2>
<a href="add_question.php">Add New Question</a>

<br><br>

<table>

    <tr>
    <th>ID</th>
    <th>Question</th>
    <th>Option A</th>
    <th>Option B</th>
    <th>Option C</th>
    <th>Option D</th>
    <th>Correct Answer</th>
    <th>Action</th>
</tr>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
    ?>

        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["question_text"]; ?></td>
            <td><?php echo $row["option_a"]; ?></td>
            <td><?php echo $row["option_b"]; ?></td>
            <td><?php echo $row["option_c"]; ?></td>
            <td><?php echo $row["option_d"]; ?></td>
            <td><?php echo $row["correct_answer"]; ?></td>
            <td>
    <a href="delete_question.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>
        </tr>

    <?php
    }
    ?>

</table>

<br>

<a href="admin_dashboard.php">Back to Admin Dashboard</a>

</body>
</html>