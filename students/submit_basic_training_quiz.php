
<?php
session_start();

include("../includes/db_connect.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit();
}

$correct_answers = [
    1 => "D",
    2 => "B",
    3 => "A",
    4 => "C",
    5 => "D"
];

$score = 0;
$total = count($correct_answers);

foreach ($correct_answers as $question_number => $correct_answer) {
    if (
        isset($_POST["answer"][$question_number]) &&
        $_POST["answer"][$question_number] === $correct_answer
    ) {
        $score++;
    }
}

$percentage = ($score / $total) * 100;
$training_score = round($percentage);

$user_id = $_SESSION["user_id"];

$sql = "UPDATE security_profiles
        SET training_score = ?, training_completed = 1
        WHERE user_id = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ii", $training_score, $user_id);
mysqli_stmt_execute($stmt);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Basic Training Results</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Basic Training Quiz Results</h1>

<h2><?php echo $score; ?> / <?php echo $total; ?></h2>

<p>Your score is <?php echo $training_score; ?>%</p>

<?php
if ($percentage >= 80) {
    echo "<p>Excellent! You understand the basic cybersecurity topics well.</p>";
} elseif ($percentage >= 50) {
    echo "<p>Good effort! Review the training topics and try again.</p>";
} else {
    echo "<p>Please review the basic training modules before trying again.</p>";
}
?>

<br>
<a href="basic_training_quiz.php">Retake Quiz</a>
<br><br>
<a href="training.php">Back to Training</a>

</body>
</html>