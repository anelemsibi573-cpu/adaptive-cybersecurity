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
    <title>Data Protection</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Data Protection</h1>

<h2>What is Data Protection?</h2>

<p>
    Data protection involves using appropriate security practices
    to prevent personal and sensitive information from being accessed,
    changed, lost, or disclosed without authorization.
</p>

<h2>Types of Sensitive Information</h2>

<ul>
    <li>Passwords and login credentials</li>
    <li>Personal identification information</li>
    <li>Financial information</li>
    <li>Academic and employment records</li>
    <li>Confidential organizational information</li>
</ul>

<h2>How to Protect Data</h2>

<ul>
    <li>Use strong and unique passwords.</li>
    <li>Enable Multi-Factor Authentication where available.</li>
    <li>Only share sensitive information with authorized people.</li>
    <li>Keep software and devices updated.</li>
    <li>Back up important information regularly.</li>
    <li>Dispose of sensitive information securely.</li>
</ul>

<h2>Data Security Principles</h2>

<p>
    Good data protection practices help maintain the confidentiality,
    integrity, and availability of information.
</p>

<h2>Key Takeaway</h2>

<p>
    Protecting sensitive information requires careful handling,
    appropriate security controls, and awareness of potential risks.
</p>

<br>

<a href="training.php">Back to Personalized Training</a>

</body>
</html>