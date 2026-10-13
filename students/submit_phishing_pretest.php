<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if (!isset($_POST["answer"])) {
    header("Location: phishing_pretest.php");
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

$percentage = ($score / count($correct_answers)) * 100;

$phishing_pretest_score = round($percentage);

$user_id = $_SESSION["user_id"];

include "../includes/db_connect.php";

$sql = "SELECT id FROM security_profiles WHERE user_id = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $user_id);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {

    $sql = "UPDATE security_profiles
            SET phishing_pretest_score = ?
            WHERE user_id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ii",
        $phishing_pretest_score,
        $user_id
    );

    mysqli_stmt_execute($stmt);

} else {

    $sql = "INSERT INTO security_profiles
            (user_id, security_score, risk_level, training_score, training_completed, phishing_score, phishing_pretest_score)
            VALUES (?, 0, 'Not Assessed', 0, 0, 0, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ii",
        $user_id,
        $phishing_pretest_score
    );

    mysqli_stmt_execute($stmt);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Phishing Pre-Test Results</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Phishing Pre-Test Results</h1>

<h2>Your Score</h2>

<p>
    You scored
    <strong><?php echo $score; ?> / 5</strong>
</p>

<p>
    Percentage:
    <strong><?php echo $phishing_pretest_score; ?>%</strong>
</p>

<p>
    Complete the cybersecurity training before taking the
    post-test.
</p>

<a href="training.php">Go to Personalized Training</a>

<br><br>

<a href="dashboard.php">Back to Dashboard</a>

</body>

</html>