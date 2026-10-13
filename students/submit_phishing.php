<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$answers = $_POST["answer"];

$correct_answers = [
    1 => "phishing",
    2 => "legitimate",
    3 => "phishing",
    4 => "legitimate",
    5 => "phishing"
];

$score = 0;

foreach ($correct_answers as $question => $correct_answer) {

    if (isset($answers[$question]) && $answers[$question] == $correct_answer) {
        $score++;
    }
}

$percentage = ($score / 5) * 100;

$phishing_score = round($percentage);

$user_id = $_SESSION["user_id"];

include "../includes/db_connect.php";

$sql = "UPDATE security_profiles
        SET phishing_score = ?
        WHERE user_id = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "ii",
    $phishing_score,
    $user_id
);

mysqli_stmt_execute($stmt);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Phishing Simulation Result</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Phishing Simulation Result</h1>

<nav>
    <a href="dashboard.php">Dashboard</a> |
    <a href="assessment.php">Assessment</a> |
    <a href="training.php">Personalized Training</a> |
    <a href="training_quiz.php">Training Quiz</a> |
    <a href="phishing_simulation.php">Phishing Simulation</a> |
    <a href="logout.php">Logout</a>
</nav>

<div class="question-card">

    <h2>Your Result</h2>

    <p>
        You scored:
        <strong><?php echo $score; ?> / 5</strong>
    </p>

    <p>
        Phishing Identification Score:
        <strong><?php echo $percentage; ?>%</strong>
    </p>

    <?php
    if ($percentage >= 80) {
        echo "<p>Excellent! You demonstrated strong phishing awareness.</p>";
    } elseif ($percentage >= 50) {
        echo "<p>Good effort! Review the phishing awareness material and try again.</p>";
    } else {
        echo "<p>You should review the phishing awareness material before trying again.</p>";
    }
    ?>

</div>

<br>

<a href="phishing_simulation.php">Try Again</a>

<br><br>

<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>