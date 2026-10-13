
<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Intermediate Cybersecurity Training Quiz</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Intermediate Cybersecurity Training Quiz</h1>

<p>
    Test your knowledge of multi-factor authentication,
    social engineering, secure networks, and data protection.
</p>

<form action="submit_intermediate_training_quiz.php" method="POST">

    <div class="question-card">
        <h3>1. What is the main purpose of multi-factor authentication (MFA)?</h3>

        <input type="radio" name="answer[1]" value="A" required>
        To make passwords shorter<br>

        <input type="radio" name="answer[1]" value="B">
        To add another verification step when signing in<br>

        <input type="radio" name="answer[1]" value="C">
        To remove the need for account security<br>

        <input type="radio" name="answer[1]" value="D">
        To share login details between users<br>
    </div>

    <div class="question-card">
        <h3>2. What is social engineering in cybersecurity?</h3>

        <input type="radio" name="answer[2]" value="A" required>
        Physically repairing a computer<br>

        <input type="radio" name="answer[2]" value="B">
        Improving a website's appearance<br>

        <input type="radio" name="answer[2]" value="C">
        Manipulating people into revealing information or granting access<br>

        <input type="radio" name="answer[2]" value="D">
        Automatically updating computer software<br>
    </div>

    <div class="question-card">
        <h3>3. Which action is safest when using public Wi-Fi?</h3>

        <input type="radio" name="answer[3]" value="A" required>
        Access sensitive accounts without checking security<br>

        <input type="radio" name="answer[3]" value="B">
        Share files with every device on the network<br>

        <input type="radio" name="answer[3]" value="C">
        Disable all device security features<br>

        <input type="radio" name="answer[3]" value="D">
        Avoid sensitive transactions on untrusted networks<br>
    </div>

    <div class="question-card">
        <h3>4. What should you do if you receive an unexpected request for confidential data?</h3>

        <input type="radio" name="answer[4]" value="A" required>
        Verify the request using a trusted communication channel<br>

        <input type="radio" name="answer[4]" value="B">
        Send the information immediately<br>

        <input type="radio" name="answer[4]" value="C">
        Forward the information to everyone<br>

        <input type="radio" name="answer[4]" value="D">
        Post the information publicly<br>
    </div>

    <div class="question-card">
        <h3>5. Why should software and operating systems be updated regularly?</h3>

        <input type="radio" name="answer[5]" value="A" required>
        To make passwords unnecessary<br>

        <input type="radio" name="answer[5]" value="B">
        To remove every cybersecurity risk permanently<br>

        <input type="radio" name="answer[5]" value="C">
        To fix known vulnerabilities and improve security<br>

        <input type="radio" name="answer[5]" value="D">
        To allow anyone to access the device<br>
    </div>

    <br>
    <button type="submit">Submit Quiz</button>

</form>

<br>
<a href="training.php">Back to Training</a>

</body>
</html>