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
    <title>Phishing Pre-Test</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Phishing Awareness Pre-Test</h1>

<nav>
    <a href="dashboard.php">Dashboard</a> |
    <a href="assessment.php">Assessment</a> |
    <a href="training.php">Personalized Training</a> |
    <a href="training_quiz.php">Training Quiz</a> |
    <a href="phishing_pretest.php">Phishing Pre-Test</a> |
    <a href="phishing_simulation.php">Phishing Simulation</a> |
    <a href="logout.php">Logout</a>
</nav>

<h2>Identify the Message</h2>

<p>
    Before completing your cybersecurity training, identify whether
    each message is <strong>Phishing</strong> or <strong>Legitimate</strong>.
</p>

<form method="POST" action="submit_phishing_pretest.php">

    <div class="question-card">

        <h3>Scenario 1</h3>

        <p>
            <strong>From:</strong> billing@electricity-example.com
        </p>

        <p>
            Your electricity account has an outstanding balance.
            Pay within 24 hours using the link below to avoid disconnection.
        </p>

        <p>
            <strong>Link:</strong>
            http://example.com/pay-now
        </p>

        <label class="answer-option">
            <input type="radio" name="answer[1]" value="phishing" required>
            Phishing
        </label>

        <label class="answer-option">
            <input type="radio" name="answer[1]" value="legitimate">
            Legitimate
        </label>

    </div>

    <div class="question-card">

        <h3>Scenario 2</h3>

        <p>
            <strong>From:</strong> library@youruniversity.ac.za
        </p>

        <p>
            Your reserved library book is ready for collection.
            Please visit the university library during normal operating hours.
        </p>

        <p>
            No password, banking information or unusual link is requested.
        </p>

        <label class="answer-option">
            <input type="radio" name="answer[2]" value="phishing" required>
            Phishing
        </label>

        <label class="answer-option">
            <input type="radio" name="answer[2]" value="legitimate">
            Legitimate
        </label>

    </div>

    <div class="question-card">

        <h3>Scenario 3</h3>

        <p>
            <strong>From:</strong> rewards@unknown-example.com
        </p>

        <p>
            You have been selected to receive a free smartphone.
            Confirm your identity by providing your username and password.
        </p>

        <label class="answer-option">
            <input type="radio" name="answer[3]" value="phishing" required>
            Phishing
        </label>

        <label class="answer-option">
            <input type="radio" name="answer[3]" value="legitimate">
            Legitimate
        </label>

    </div>

    <div class="question-card">

        <h3>Scenario 4</h3>

        <p>
            <strong>From:</strong> lecturer@youruniversity.ac.za
        </p>

        <p>
            Your lecturer has uploaded the week's lecture material
            to the university learning platform. Log in through the
            normal university website to access it.
        </p>

        <label class="answer-option">
            <input type="radio" name="answer[4]" value="phishing" required>
            Phishing
        </label>

        <label class="answer-option">
            <input type="radio" name="answer[4]" value="legitimate">
            Legitimate
        </label>

    </div>

    <div class="question-card">

        <h3>Scenario 5</h3>

        <p>
            <strong>From:</strong> security-alert@unknown-example.com
        </p>

        <p>
            Your account will be permanently deleted today.
            Click the link immediately and enter your password
            to prevent deletion.
        </p>

        <p>
            <strong>Link:</strong>
            http://example.com/account-security
        </p>

        <label class="answer-option">
            <input type="radio" name="answer[5]" value="phishing" required>
            Phishing
        </label>

        <label class="answer-option">
            <input type="radio" name="answer[5]" value="legitimate">
            Legitimate
        </label>

    </div>

    <button type="submit">Submit Pre-Test</button>

</form>

<br>

<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>