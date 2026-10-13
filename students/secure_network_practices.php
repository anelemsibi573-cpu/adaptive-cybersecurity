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
    <title>Secure Network Practices</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Secure Network Practices</h1>

<h2>What are Secure Network Practices?</h2>

<p>
    Secure network practices are actions that help protect devices,
    connections, and information from unauthorized access and
    cyberattacks.
</p>

<h2>Important Practices</h2>

<ul>
    <li>Use secure and trusted Wi-Fi networks.</li>
    <li>Avoid entering sensitive information on unsecured public networks.</li>
    <li>Use strong passwords for network devices and accounts.</li>
    <li>Keep operating systems and network software updated.</li>
    <li>Use firewalls and other appropriate security controls.</li>
</ul>

<h2>Public Wi-Fi Safety</h2>

<p>
    Public Wi-Fi networks can expose users to security risks.
    Avoid accessing highly sensitive accounts on unfamiliar networks
    and verify that websites use secure connections before entering
    confidential information.
</p>

<h2>Network Security Risks</h2>

<ul>
    <li>Unauthorized access</li>
    <li>Malware infections</li>
    <li>Data interception</li>
    <li>Weak or compromised passwords</li>
</ul>

<h2>Key Takeaway</h2>

<p>
    Practising safe network behaviour reduces the risk of unauthorized
    access and helps protect personal and organizational information.
</p>

<br>

<a href="training.php">Back to Personalized Training</a>

</body>
</html>