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
    <title>Strong Passwords</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Creating Strong Passwords</h1>

<h2>Why Are Strong Passwords Important?</h2>

<p>
    Passwords help protect accounts and personal information from
    unauthorized access. Weak or reused passwords can make accounts
    easier for attackers to compromise.
</p>

<h2>Characteristics of a Strong Password</h2>

<ul>
    <li>Use a long password or passphrase.</li>
    <li>Use a unique password for each important account.</li>
    <li>Avoid easily guessed personal information.</li>
    <li>Use a mixture of different types of characters when appropriate.</li>
    <li>Consider using a trusted password manager.</li>
</ul>

<h2>Password Safety</h2>

<ul>
    <li>Never share your passwords with other people.</li>
    <li>Do not reuse the same password across multiple accounts.</li>
    <li>Change compromised passwords immediately.</li>
    <li>Enable Multi-Factor Authentication when available.</li>
</ul>

<h2>Key Takeaway</h2>

<p>
    Strong, unique passwords provide an important first layer of
    protection for your online accounts.
</p>

<br>

<a href="training.php">Back to Personalized Training</a>

</body>
</html>