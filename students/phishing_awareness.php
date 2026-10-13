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
    <title>Phishing Awareness</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Recognizing Phishing Attacks</h1>

<h2>What is Phishing?</h2>

<p>
    Phishing is a type of cyberattack in which an attacker uses
    fraudulent messages or websites to trick people into providing
    information or performing an unsafe action.
</p>

<h2>Common Warning Signs</h2>

<ul>
    <li>Unexpected emails or messages.</li>
    <li>Urgent requests for action.</li>
    <li>Requests for passwords or other sensitive information.</li>
    <li>Suspicious links or attachments.</li>
    <li>Messages from unfamiliar or misleading senders.</li>
</ul>

<h2>How to Stay Safe</h2>

<ul>
    <li>Check the sender before responding.</li>
    <li>Do not click suspicious links.</li>
    <li>Never share passwords or verification codes through unexpected messages.</li>
    <li>Visit websites directly instead of using suspicious links.</li>
    <li>Report suspected phishing messages.</li>
</ul>

<h2>Before You Click</h2>

<p>
    Stop and examine unexpected messages carefully. Consider whether
    you were expecting the message, whether the request makes sense,
    and whether the sender and destination are trustworthy.
</p>

<h2>Key Takeaway</h2>

<p>
    Being able to recognize suspicious messages is an important part
    of protecting yourself against phishing attacks.
</p>

<br>

<a href="training.php">Back to Personalized Training</a>

</body>
</html>