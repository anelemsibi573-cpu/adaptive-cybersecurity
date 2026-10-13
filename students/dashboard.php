<?php
session_start();
include "../includes/db_connect.php";

if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT security_score, risk_level, training_score, training_completed,
               phishing_score, phishing_pretest_score
        FROM security_profiles
        WHERE user_id = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $_SESSION["user_id"]);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$profile = mysqli_fetch_assoc($result);

if (!$profile) {
    $profile = [
        "security_score" => 0,
        "risk_level" => "Not Assessed",
        "training_score" => 0,
        "training_completed" => 0,
        "phishing_score" => 0,
        "phishing_pretest_score" => 0
    ];
}

$securityScore = (int) $profile["security_score"];
$riskLevel = $profile["risk_level"];
$trainingScore = (int) $profile["training_score"];
$trainingCompleted = (int) $profile["training_completed"];
$phishingScore = (int) $profile["phishing_score"];
$phishingPretestScore = (int) $profile["phishing_pretest_score"];
$phishingImprovement = $phishingScore - $phishingPretestScore;
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard | Adaptive Cybersecurity</title>
    <link rel="stylesheet" href="../CSS/style.css">

<style>
    body {
        margin: 0;
        background: #f4f7fb;
        color: #243247;
        font-family: Arial, Helvetica, sans-serif;
    }

    .dashboard-header {
        background: #142d4e;
        color: white;
        padding: 25px 6%;
    }

    .dashboard-header h1 {
        margin: 0 0 8px;
        font-size: 28px;
    }

    .dashboard-header p {
        margin: 0;
        color: #dce7f5;
    }

    .main-nav {
        background: #ffffff;
        padding: 0 6%;
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
        border-bottom: 1px solid #e1e7ef;
        box-shadow: 0 2px 8px rgba(20, 45, 78, 0.06);
    }

    .main-nav a {
        display: inline-block;
        padding: 17px 13px;
        color: #263d5b;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        border-bottom: 3px solid transparent;
    }

    .main-nav a:hover,
    .main-nav a.active {
        color: #1769aa;
        border-bottom-color: #1769aa;
    }

    .dashboard-content {
        max-width: 1200px;
        margin: 30px auto;
        padding: 0 24px;
    }

    .section-heading {
        margin-bottom: 20px;
    }

    .section-heading h2 {
        margin: 0 0 7px;
        color: #142d4e;
        font-size: 23px;
    }

    .section-heading p {
        margin: 0;
        color: #64748b;
        font-size: 14px;
    }

    .dashboard-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-bottom: 25px;
    }

    .dashboard-container .dashboard-card,
    .recommendation-card {
        box-sizing: border-box;
        background: #ffffff;
        border: 1px solid #e5eaf1;
        border-radius: 12px;
        padding: 23px;
        box-shadow: 0 4px 14px rgba(25, 48, 75, 0.05);
    }

    .dashboard-container .dashboard-card {
        margin: 0;
        min-width: 0;
    }

    .dashboard-card h3,
    .recommendation-card h3 {
        margin: 0 0 15px;
        font-size: 15px;
        color: #607087;
        font-weight: 600;
    }

    .dashboard-card .score {
        margin: 0;
        color: #142d4e;
        font-size: 25px;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    .recommendation-card {
        margin-bottom: 24px;
        border-left: 5px solid #2580c3;
    }

    .recommendation-card h3 {
        color: #142d4e;
        font-size: 19px;
    }

    .recommendation-card p {
        color: #475569;
        line-height: 1.7;
        margin: 10px 0;
    }

    .training-button {
        display: inline-block;
        background: #1769aa;
        color: #ffffff;
        padding: 12px 20px;
        border-radius: 7px;
        text-decoration: none;
        font-weight: 600;
        margin-top: 5px;
    }

    .training-button:hover {
        background: #125487;
    }

    .dashboard-footer {
        text-align: center;
        color: #718096;
        font-size: 13px;
        padding: 15px 20px 30px;
    }

    @media (max-width: 600px) {
        .dashboard-header {
            padding: 22px 20px;
        }

        .dashboard-header h1 {
            font-size: 23px;
        }

        .main-nav {
            padding: 5px 12px;
            gap: 0;
        }

        .main-nav a {
            padding: 12px 9px;
            font-size: 13px;
        }

        .dashboard-content {
            margin: 22px auto;
            padding: 0 15px;
        }

        .dashboard-container {
            grid-template-columns: 1fr;
            gap: 14px;
        }
    }
</style>

</head>

<body>

<header class="dashboard-header">
    <h1>Adaptive Cybersecurity Platform</h1>
    <p>Welcome back, <?php echo htmlspecialchars($_SESSION["username"]); ?>.
       Monitor your security progress and continue learning.</p>
</header>

<nav class="main-nav">
    <a href="dashboard.php" class="active">Dashboard</a>
    <a href="assessment.php">Assessment</a>
    <a href="training.php">Personalized Training</a>
    <a href="basic_training_quiz.php">Basic Quiz</a>
    <a href="intermediate_training_quiz.php">Intermediate Quiz</a>
    <a href="training_quiz.php">Advanced Quiz</a>
    <a href="phishing_simulation.php">Phishing Simulation</a>
    <a href="logout.php">Logout</a>
</nav>

<main class="dashboard-content">

<div class="section-heading">
    <h2>Your Security Overview</h2>
    <p>Review your current scores, training progress and phishing awareness.</p>
</div>

<div class="dashboard-container">

    <div class="dashboard-card">
        <h3>Security Score</h3>
        <p class="score"><?php echo $securityScore; ?> / 100</p>
    </div>

    <div class="dashboard-card">
        <h3>Risk Level</h3>
        <p class="score"><?php echo htmlspecialchars($riskLevel); ?></p>
    </div>

    <div class="dashboard-card">
        <h3>Training Score</h3>
        <p class="score"><?php echo $trainingScore; ?> / 100</p>
    </div>

    <div class="dashboard-card">
        <h3>Training Status</h3>
        <p class="score">
            <?php echo $trainingCompleted === 1 ? "Completed" : "Not Completed"; ?>
        </p>
    </div>

    
<div class="dashboard-card">
    <h3>Phishing Pre-Test</h3>
    <p class="score">
        <?php echo $phishingPretestScore; ?> / 100
    </p>

    <a class="training-button"
       href="phishing_pretest.php">
        Take Phishing Pre-Test
    </a>
</div>

    <div class="dashboard-card">
        <h3>Phishing Awareness</h3>
        <p class="score"><?php echo $phishingScore; ?> / 100</p>
    </div>

    <div class="dashboard-card">
        <h3>Phishing Improvement</h3>
        <p class="score">
            <?php echo ($phishingImprovement > 0 ? "+" : "") . $phishingImprovement; ?>
            <span style="font-size: 14px;">points</span>
        </p>
    </div>

</div>

<section class="recommendation-card">
    <h3>Recommended Training</h3>

    <?php
    if ($riskLevel === "Not Assessed" || $riskLevel === "High") {
        echo "<p>Start with Basic Cybersecurity Training to build your cybersecurity knowledge.</p>";
    } elseif ($riskLevel === "Medium") {
        echo "<p>Continue with Intermediate Cybersecurity Training to strengthen your security skills.</p>";
    } else {
        echo "<p>You are ready for Advanced Cybersecurity Training to develop your knowledge further.</p>";
    }

    if ($phishingScore < 50) {
        echo "<p><strong>Phishing recommendation:</strong> Focus on Beginner Phishing Awareness Training.</p>";
    } elseif ($phishingScore < 80) {
        echo "<p><strong>Phishing recommendation:</strong> Continue with Intermediate Phishing Awareness Training.</p>";
    } else {
        echo "<p><strong>Phishing recommendation:</strong> Continue practising with Advanced Phishing Awareness Training.</p>";
    }
    ?>

    <a class="training-button" href="training.php">Continue to Personalized Training</a>
</section>

</main>

<footer class="dashboard-footer">
    Adaptive Cybersecurity Awareness Platform
</footer>

</body>
</html>
