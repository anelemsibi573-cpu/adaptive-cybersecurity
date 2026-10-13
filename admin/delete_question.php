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

$question_id = $_GET["id"];

$sql = "DELETE FROM questions WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $question_id);

mysqli_stmt_execute($stmt);

header("Location: manage_questions.php");
exit();
?>