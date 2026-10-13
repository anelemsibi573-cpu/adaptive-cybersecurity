<?php
session_start();

include("../includes/db_connect.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<h1>Incident Response</h1>

<p>
    Incident response is the process of identifying, managing,
    and recovering from cybersecurity incidents.
</p>

<h2>What is an Incident?</h2>

<p>
    A cybersecurity incident is an event that may compromise the
    confidentiality, integrity, or availability of information systems.
</p>

<h2>Key Steps in Incident Response</h2>

<ul>
    <li>Identify the security incident</li>
    <li>Contain the threat</li>
    <li>Investigate what happened</li>
    <li>Remove the threat</li>
    <li>Recover affected systems</li>
    <li>Review the incident and improve security</li>
</ul>

<h2>Why is Incident Response Important?</h2>

<p>
    A well-planned response helps organizations reduce damage,
    restore normal operations, and prevent similar incidents
    from happening again.
</p>

<h2>Example</h2>

<p>
    If an employee discovers that their account has been compromised,
    the organization may disable the account, investigate the activity,
    remove the attacker's access, reset the credentials, and monitor
    the account for further suspicious activity.
</p>

<br>

<a href="training.php">Back to Training</a>

</body>
</html>