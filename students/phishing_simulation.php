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
    <title>Phishing Simulation</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Phishing Awareness Simulation</h1>

<nav>
    <a href="dashboard.php">Dashboard</a> |
    <a href="assessment.php">Assessment</a> |
    <a href="training.php">Personalized Training</a> |
    <a href="training_quiz.php">Training Quiz</a> |
    <a href="phishing_simulation.php">Phishing Simulation</a> |
    <a href="logout.php">Logout</a>
</nav>

<h2>Identify the Phishing Message</h2>

<p>
    Read each message carefully and decide whether it is
    <strong>Phishing</strong> or <strong>Legitimate</strong>.
</p>

<form method="POST" action="submit_phishing.php">

    <div class="question-card">

        <h3>Scenario 1</h3>

        <p>
            <strong>From:</strong> security@yourbank-example.com
        </p>

        <p>
            Your account has been temporarily suspended.
            Click the link below immediately to verify your account
            and prevent permanent closure.
        </p>

        <p>
            <strong>Link:</strong>
            http://example.com/verify-account
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
            <strong>From:</strong> university@youruniversity.ac.za
        </p>

        <p>
            Your lecturer has posted a new announcement on the
            university learning platform. Please log in through
            the usual university website to view the announcement.
        </p>

        <p>
            No unusual links or requests for personal information are included.
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
            <strong>From:</strong> prizes@unknown-example.com
        </p>

        <p>
            Congratulations! You have won R50,000.
            Send your banking details and password within 30 minutes
            to claim your prize.
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
            <strong>From:</strong> hr@yourcompany-example.com
        </p>

        <p>
            Please review the company's updated leave policy
            on the official employee portal. You can access the
            portal using your normal company login.
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
            <strong>From:</strong> support@unknown-example.com
        </p>

        <p>
            We detected suspicious activity on your account.
            Send us your password and one-time PIN so that we can
            secure your account immediately.
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

    <button type="submit">Submit Phishing Simulation</button>

</form>

<br>

<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>