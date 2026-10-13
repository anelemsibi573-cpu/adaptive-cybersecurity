<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Social Engineering</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Social Engineering Attacks</h1>

<h2>What is Social Engineering?</h2>

<p>
    Social engineering is a technique used by attackers to manipulate
    people into revealing confidential information, performing unsafe
    actions, or providing unauthorized access.
</p>

<h2>Common Social Engineering Attacks</h2>

<ul>
    <li><strong>Phishing:</strong> Fraudulent messages designed to trick users.</li>
    <li><strong>Pretexting:</strong> Creating a false situation to obtain information.</li>
    <li><strong>Impersonation:</strong> Pretending to be a trusted person or organization.</li>
    <li><strong>Social manipulation:</strong> Using pressure or deception to influence a victim.</li>
</ul>

<h2>Warning Signs</h2>

<ul>
    <li>Unexpected requests for passwords or personal information.</li>
    <li>Messages that create a strong sense of urgency.</li>
    <li>Unusual requests from people claiming to be staff or support.</li>
    <li>Links or attachments from unexpected sources.</li>
</ul>

<h2>How to Protect Yourself</h2>

<ul>
    <li>Verify unexpected requests before responding.</li>
    <li>Never share passwords or verification codes.</li>
    <li>Check the sender before clicking links.</li>
    <li>Report suspicious messages to the appropriate authority.</li>
</ul>

<h2>Key Takeaway</h2>

<p>
    Attackers often target people rather than technology.
    Thinking carefully before responding to unexpected requests
    can help prevent social engineering attacks.
</p>

<br>

<a href="training.php">Back to Personalized Training</a>

</body>
</html>