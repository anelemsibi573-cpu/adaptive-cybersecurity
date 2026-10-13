<?php
session_start();

include("../includes/db_connect.php");

$user_id = $_SESSION["user_id"];

$sql = "SELECT security_score, risk_level 
        FROM security_profiles 
        WHERE user_id = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$profile = mysqli_fetch_assoc($result);

if (!$profile) {
    $profile = [
        "security_score" => 0,
        "risk_level" => "Not Assessed"
    ];
}

$security_score = $profile['security_score'];
$risk_level = $profile['risk_level'];
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Personalized Cybersecurity Training</h1>

<p>Your Security Score: <?php echo $security_score; ?>/100</p>

<p>Your Risk Level: <?php echo $risk_level; ?></p>

<?php

if ($risk_level == "Not Assessed" || $risk_level == "High") {
?>

    <h2>Basic Cybersecurity Training</h2>

    <p>
        Your security profile shows that you need to strengthen
        your basic cybersecurity knowledge.
    </p>

    <h3>Topics to learn:</h3>

    <div class="training-topics">

        <a href="strong_passwords.php" class="training-card">
            <h3>Strong Passwords</h3>
            <p>Learn how to create and protect strong, unique passwords.</p>
        </a>

        <a href="phishing_awareness.php" class="training-card">
            <h3>Phishing Awareness</h3>
            <p>Learn how to recognize and avoid phishing attacks.</p>
        </a>

        <a href="safe_browsing.php" class="training-card">
            <h3>Safe Internet Browsing</h3>
            <p>Learn safe browsing practices and how to reduce online risks.</p>
        </a>

        <a href="protecting_personal_information.php" class="training-card">
            <h3>Protecting Personal Information</h3>
            <p>Learn how to protect your personal, academic, and sensitive information.</p>
        </a>

    </div>

     <br>

    <a href="basic_training_quiz.php" class="training-card">
        <h3>Take Basic Training Quiz</h3>
        <p>Test your basic cybersecurity knowledge.</p>
    </a>

<?php
} elseif ($risk_level == "Medium") {
?>

    <h2>Intermediate Cybersecurity Training</h2>

    <p>
        You have a reasonable level of cybersecurity knowledge,
        but there are areas that can still be improved.
    </p>


    <h3>Topics to learn:</h3>

<div class="training-topics">

    <a href="multi_factor_authentication.php" class="training-card">
        <h3>Multi-Factor Authentication</h3>
        <p>Learn how additional authentication factors can protect your accounts.</p>
    </a>

    <a href="social_engineering.php" class="training-card">
        <h3>Social Engineering</h3>
        <p>Learn how attackers manipulate people to gain information or access.</p>
    </a>

    <a href="secure_network_practices.php" class="training-card">
        <h3>Secure Network Practices</h3>
        <p>Learn how to use networks safely and reduce network security risks.</p>
    </a>

    <a href="data_protection.php" class="training-card">
        <h3>Data Protection</h3>
        <p>Learn how to protect personal, academic, and sensitive information.</p>
    </a>

</div>


<br>

<a href="intermediate_training_quiz.php" class="training-card">
    <h3>Take Intermediate Training Quiz</h3>
    <p>Test your intermediate cybersecurity knowledge.</p>
</a>

<?php
} else {
?>

    <h2>Advanced Cybersecurity Training</h2>

    <p>
        Your security profile shows strong cybersecurity knowledge.
        You can continue with more advanced topics.
    </p>

    <h3>Topics to learn:</h3>

    <div class="training-topics">

    <a href="advanced_threat_detection.php" class="training-card">
        <h3>Advanced Threat Detection</h3>
        <p>Learn how to identify and detect potential cyber threats.</p>
    </a>

    <a href="incident_response.php" class="training-card">
        <h3>Incident Response</h3>
        <p>Learn how to respond effectively to cybersecurity incidents.</p>
    </a>

    <a href="network_security.php" class="training-card">
        <h3>Network Security</h3>
        <p>Learn how to protect networks from unauthorized access and attacks.</p>
    </a>

    <a href="risk_management.php" class="training-card">
        <h3>Cybersecurity Risk Management</h3>
        <p>Learn how to identify, assess, and manage cybersecurity risks.</p>
    </a>

</div>

<a href="training_quiz.php">
    Take Training Quiz
</a>
    </ul>

<?php
}
?>

<br>

<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>