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
    <title>Multi-Factor Authentication</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Multi-Factor Authentication</h1>

<h2>What is Multi-Factor Authentication?</h2>

<p>
    Multi-Factor Authentication (MFA) is a security method that requires
    users to provide more than one form of verification before accessing
    an account.
</p>

<h2>Why is MFA Important?</h2>

<p>
    MFA provides an additional layer of security. If an attacker obtains
    a user's password, the attacker may still be unable to access the
    account without the additional verification factor.
</p>

<h2>Common Authentication Factors</h2>

<ul>
    <li><strong>Something you know:</strong> A password or PIN.</li>
    <li><strong>Something you have:</strong> A mobile phone or security token.</li>
    <li><strong>Something you are:</strong> A fingerprint or facial recognition.</li>
</ul>

<h2>Best Practices</h2>

<ul>
    <li>Enable MFA on important accounts.</li>
    <li>Use an authenticator app where possible.</li>
    <li>Never share verification codes with other people.</li>
    <li>Do not approve login requests that you did not initiate.</li>
</ul>

<h2>Key Takeaway</h2>

<p>
    MFA strengthens account security by requiring additional verification
    beyond a password.
</p>

<br>

<a href="training.php">Back to Personalized Training</a>

</body>
</html>