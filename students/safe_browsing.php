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
    <title>Safe Internet Browsing</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Safe Internet Browsing</h1>

<h2>What is Safe Internet Browsing?</h2>

<p>
    Safe internet browsing involves using websites and online services
    carefully to reduce the risk of malware, scams, phishing, and
    unauthorized access to personal information.
</p>

<h2>Safe Browsing Practices</h2>

<ul>
    <li>Check website addresses before entering sensitive information.</li>
    <li>Use secure and trusted websites.</li>
    <li>Keep your browser and operating system updated.</li>
    <li>Avoid downloading files from unknown sources.</li>
    <li>Be careful when clicking links in unexpected messages.</li>
    <li>Use strong passwords and Multi-Factor Authentication where available.</li>
</ul>

<h2>Be Careful with Downloads</h2>

<p>
    Download files only from trusted sources. Unknown files or
    suspicious downloads may contain malware that can harm your device
    or compromise your information.
</p>

<h2>Protect Your Information</h2>

<p>
    Avoid entering sensitive personal or financial information on
    unfamiliar websites. Before submitting information, verify that
    you are using the legitimate website.
</p>

<h2>Key Takeaway</h2>

<p>
    Careful browsing habits can reduce exposure to online threats
    and help protect your personal information and devices.
</p>

<br>

<a href="training.php">Back to Personalized Training</a>

</body>
</html>