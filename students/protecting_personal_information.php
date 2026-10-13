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
    <title>Protecting Personal Information</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Protecting Personal Information</h1>

<h2>Why Personal Information Matters</h2>

<p>
    Personal information includes details such as your name, email address,
    phone number, passwords, student information, and financial information.
    Cybercriminals may try to obtain this information for fraudulent or
    malicious purposes.
</p>

<h2>How to Protect Your Information</h2>

<ul>
    <li>Avoid sharing sensitive information with unknown people.</li>
    <li>Use strong and unique passwords for your accounts.</li>
    <li>Be careful when clicking links in emails and messages.</li>
    <li>Use privacy settings on social media accounts.</li>
    <li>Avoid entering sensitive information on suspicious websites.</li>
    <li>Keep your devices and software updated.</li>
</ul>

<h2>Be Careful Online</h2>

<p>
    Before providing personal information online, make sure you know who
    is requesting it and why they need it. Never share passwords or
    authentication codes with other people.
</p>

<a href="training.php">Back to Training</a>

</body>
</html>