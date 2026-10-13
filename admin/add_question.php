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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Question</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Add Cybersecurity Question</h1>

<nav>
    <a href="admin_dashboard.php">Dashboard</a> |
    <a href="manage_users.php">Manage Users</a> |
    <a href="manage_questions.php">Manage Questions</a> |
    <a href="view_results.php">View Results</a> |
    <a href="../students/logout.php">Logout</a>
</nav>

<h2>New Assessment Question</h2>

<form method="POST" action="save_question.php">

    <div class="question-card">

        <label>Question:</label>
        <br>

        <textarea name="question_text" rows="4" cols="60" required></textarea>

        <br><br>

        <label>Option A:</label>
        <br>

        <input type="text" name="option_a" required>

        <br><br>

        <label>Option B:</label>
        <br>

        <input type="text" name="option_b" required>

        <br><br>

        <label>Option C:</label>
        <br>

        <input type="text" name="option_c" required>

        <br><br>

        <label>Option D:</label>
        <br>

        <input type="text" name="option_d" required>

        <br><br>

        <label>Correct Answer:</label>
        <br>

        <select name="correct_answer" required>

            <option value="">Select correct answer</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>

        </select>

        <br><br>

        <button type="submit">Add Question</button>

    </div>

</form>

<br>

<a href="manage_questions.php">Back to Manage Questions</a>

</body>
</html>