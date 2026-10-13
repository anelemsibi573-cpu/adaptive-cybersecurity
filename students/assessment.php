<?php
include("../includes/db_connect.php");

$sql = "SELECT * FROM questions";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Cybersecurity Assessment</h1>

<p>Answer the following cybersecurity questions.</p>

<form method="POST" action="submit_assessment.php">

<?php
$number = 1;

while ($row = mysqli_fetch_assoc($result)) {
?>

    <div class="question-card">
    <h3>
        <?php echo $number . ". " . $row['question_text']; ?>
    </h3>

        <label class="answer-option">
    <input type="radio"
           name="answer[<?php echo $row['id']; ?>]"
           value="a">
    <?php echo $row['option_a']; ?>
</label>
<br>

        <label class="answer-option">
    <input type="radio"
           name="answer[<?php echo $row['id']; ?>]"
           value="b">
    <?php echo $row['option_b']; ?>
</label>
<br>

        <label class="answer-option">
    <input type="radio"
           name="answer[<?php echo $row['id']; ?>]"
           value="c">
    <?php echo $row['option_c']; ?>
</label>
<br>

        <label class="answer-option">
    <input type="radio"
           name="answer[<?php echo $row['id']; ?>]"
           value="d">
    <?php echo $row['option_d']; ?>
</label>

    </div>

    <br>

<?php
    $number++;
}
?>

<button type="submit">Submit Assessment</button>

</form>

</body>
</html>