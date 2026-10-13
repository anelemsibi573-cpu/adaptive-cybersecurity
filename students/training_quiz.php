<?php
session_start();

include("../includes/db_connect.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cybersecurity Training Quiz</title>

    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Cybersecurity Training Quiz</h1>

<p>
    Test your knowledge of the cybersecurity topics
    covered in your personalized training.
</p>

<form action="submit_training_quiz.php" method="POST">

    <div class="question-card">

    <h3>1. What is the main purpose of a firewall?</h3>

    <input type="radio" name="answer[1]" value="A">
    To store passwords
    <br>

    <input type="radio" name="answer[1]" value="B">
    To control and filter network traffic
    <br>

    <input type="radio" name="answer[1]" value="C">
    To create computer viruses
    <br>

    <input type="radio" name="answer[1]" value="D">
    To increase screen brightness
    <br>
    </div>

    <div class="question-card">

    <h3>2. What is incident response?</h3>

    <input type="radio" name="answer[2]" value="A">
    The process of responding to cybersecurity incidents
    <br>

    <input type="radio" name="answer[2]" value="B">
    Installing computer games
    <br>

    <input type="radio" name="answer[2]" value="C">
    Designing websites
    <br>

    <input type="radio" name="answer[2]" value="D">
    Creating social media accounts
    <br>
    </div>

    <div class="question-card">

    <h3>3. Which of the following can help detect suspicious activity on a network?</h3>

    <input type="radio" name="answer[3]" value="A">
    Intrusion Detection System
    <br>

    <input type="radio" name="answer[3]" value="B">
    Calculator
    <br>

    <input type="radio" name="answer[3]" value="C">
    Printer
    <br>

    <input type="radio" name="answer[3]" value="D">
    Keyboard
    <br>
    </div>
    
    <div class="question-card">

    <h3>4. What is the first step in cybersecurity risk management?</h3>

    <input type="radio" name="answer[4]" value="A">
    Ignore the risk
    <br>

    <input type="radio" name="answer[4]" value="B">
    Identify the risk
    <br>

    <input type="radio" name="answer[4]" value="C">
    Delete the network
    <br>

    <input type="radio" name="answer[4]" value="D">
    Turn off all computers
    <br>
    </div>

    <div class="question-card">

    <h3>5. Why is network monitoring important?</h3>

    <input type="radio" name="answer[5]" value="A">
    To detect suspicious or unusual activity
    <br>

    <input type="radio" name="answer[5]" value="B">
    To make computers heavier
    <br>

    <input type="radio" name="answer[5]" value="C">
    To remove the internet
    <br>

    <input type="radio" name="answer[5]" value="D">
    To change the computer wallpaper
    <br>
    <div class="question-card">

    <br>

    <button type="submit">Submit Quiz</button>

</form>

<br>

<a href="training.php">Back to Training</a>

</body>

</html>