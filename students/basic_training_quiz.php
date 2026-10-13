<?php
session_start();

include("../includes/db_connect.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Basic Cybersecurity Training Quiz</title>

    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Basic Cybersecurity Training Quiz</h1>

<p>
    Test your knowledge of the basic cybersecurity topics
    covered in your personalized training.
</p>

<form action="submit_basic_training_quiz.php" method="POST">

    <div class="question-card">

        <h3>1. Which of the following is an example of a strong password?</h3>

        <input type="radio" name="answer[1]" value="A">
        password123
        <br>

        <input type="radio" name="answer[1]" value="B">
        12345678
        <br>

        <input type="radio" name="answer[1]" value="C">
        S!mple2020
        <br>

        <input type="radio" name="answer[1]" value="D">
        T7#qL9!mP2@x
        <br>

    </div>


    <div class="question-card">

        <h3>2. Which of the following is a common sign of a phishing message?</h3>

        <input type="radio" name="answer[2]" value="A">
        It comes from a trusted person you know
        <br>

        <input type="radio" name="answer[2]" value="B">
        It asks you to urgently provide sensitive information
        <br>

        <input type="radio" name="answer[2]" value="C">
        It contains information you expected
        <br>

        <input type="radio" name="answer[2]" value="D">
        It is stored on your computer
        <br>

    </div>


    <div class="question-card">

        <h3>3. What should you do before entering personal information on a website?</h3>

        <input type="radio" name="answer[3]" value="A">
        Check that the website is trustworthy and secure
        <br>

        <input type="radio" name="answer[3]" value="B">
        Enter the information immediately
        <br>

        <input type="radio" name="answer[3]" value="C">
        Share your password first
        <br>

        <input type="radio" name="answer[3]" value="D">
        Disable all security settings
        <br>

    </div>


    <div class="question-card">

        <h3>4. Which action helps protect personal information?</h3>

        <input type="radio" name="answer[4]" value="A">
        Sharing passwords with friends
        <br>

        <input type="radio" name="answer[4]" value="B">
        Posting sensitive information publicly
        <br>

        <input type="radio" name="answer[4]" value="C">
        Keeping sensitive information private
        <br>

        <input type="radio" name="answer[4]" value="D">
        Using the same password everywhere
        <br>

    </div>


    <div class="question-card">

        <h3>5. Which practice is safest when browsing the internet?</h3>

        <input type="radio" name="answer[5]" value="A">
        Clicking every link that appears
        <br>

        <input type="radio" name="answer[5]" value="B">
        Downloading files from unknown websites
        <br>

        <input type="radio" name="answer[5]" value="C">
        Ignoring browser security warnings
        <br>

        <input type="radio" name="answer[5]" value="D">
        Avoiding suspicious websites and links
        <br>

    </div>


    <br>

    <button type="submit">Submit Quiz</button>

</form>

<br>

<a href="training.php">Back to Training</a>

</body>

</html>