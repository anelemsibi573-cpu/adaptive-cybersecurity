<?php
session_start();

include("../includes/db_connect.php");

$score = 0;
$total = 5;

$correct_answers = [
    1 => "B",
    2 => "A",
    3 => "A",
    4 => "B",
    5 => "A"
];

if (isset($_POST['answer'])) {

    foreach ($correct_answers as $question_number => $correct_answer) {

        if (isset($_POST['answer'][$question_number])) {

            $user_answer = $_POST['answer'][$question_number];

            if ($user_answer == $correct_answer) {
                $score++;
            }
        }
    }
}

$percentage = ($score / $total) * 100;

$training_score = round($percentage);

$user_id = $_SESSION["user_id"];

$sql = "UPDATE security_profiles
        SET training_score = ?, training_completed = 1
        WHERE user_id = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "ii",
    $training_score,
    $user_id
);

mysqli_stmt_execute($stmt);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Training Quiz Results</title>
</head>

<body>

<h1>Training Quiz Results</h1>

<h2>
    <?php echo $score; ?> / <?php echo $total; ?>
</h2>

<p>
    Your score is
    <?php echo $percentage; ?>%
</p>

<?php

if ($percentage >= 80) {

    echo "<p>Excellent! You have a strong understanding of the training material.</p>";

} elseif ($percentage >= 50) {

    echo "<p>Good effort! Review the training modules and try the quiz again.</p>";

} else {

    echo "<p>You should review the training modules before attempting the quiz again.</p>";
}

?>

<br>

<a href="training_quiz.php">Retake Quiz</a>

<br><br>

<a href="training.php">Back to Training</a>

</body>

</html>