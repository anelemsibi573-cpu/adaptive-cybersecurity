
<?php
session_start();
include("../includes/db_connect.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION["user_id"];

$score = 0;
$total = 0;

if (isset($_POST["answer"]) && is_array($_POST["answer"])) {

    foreach ($_POST["answer"] as $question_id => $user_answer) {

        $question_id = intval($question_id);

        $sql = "SELECT correct_answer FROM questions WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "i", $question_id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $total++;

            if ($user_answer == $row["correct_answer"]) {
                $score++;
            }
        }

        mysqli_stmt_close($stmt);
    }
}

$percentage = 0;
$security_score = 0;
$risk_level = "Not Assessed";
$save_message = "";

if ($total > 0) {

    $percentage = ($score / $total) * 100;
    $security_score = round($percentage);

    if ($security_score >= 80) {
        $risk_level = "Low";
    } elseif ($security_score >= 50) {
        $risk_level = "Medium";
    } else {
        $risk_level = "High";
    }

    $sql = "SELECT id FROM security_profiles WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $profile = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

    if ($profile) {

        $sql = "UPDATE security_profiles
                SET security_score = ?,
                    risk_level = ?,
                    updated_at = NOW()
                WHERE user_id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            "isi",
            $security_score,
            $risk_level,
            $user_id
        );

    } else {

        $sql = "INSERT INTO security_profiles
                (user_id, security_score, risk_level, updated_at)
                VALUES (?, ?, ?, NOW())";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            "iis",
            $user_id,
            $security_score,
            $risk_level
        );
    }

    if (mysqli_stmt_execute($stmt)) {
        $save_message = "Your security score has been saved successfully.";
    } else {
        $save_message = "Your score could not be saved. Please contact the administrator.";
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Assessment Results</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Assessment Complete</h1>

<h2>Your Score</h2>

<p><?php echo $score . " / " . $total; ?></p>

<?php if ($total > 0) { ?>

    <p>Your percentage: <?php echo round($percentage, 2); ?>%</p>

    <p>
        Security Score: <?php echo $security_score; ?>/100
    </p>

    <p>Risk Level: <?php echo htmlspecialchars($risk_level); ?></p>

    <p><?php echo htmlspecialchars($save_message); ?></p>

    <?php if ($percentage >= 80) { ?>

        <h3>Excellent cybersecurity knowledge!</h3>

    <?php } elseif ($percentage >= 50) { ?>

        <h3>Good effort! There is still room to improve.</h3>

    <?php } else { ?>

        <h3>You should improve your cybersecurity knowledge.</h3>

    <?php } ?>

<?php } else { ?>

    <p>No valid answers were received. Please retake the assessment.</p>

<?php } ?>

<br>

<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>