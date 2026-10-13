<?php

include "../includes/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $role = "user";

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users (username, email, password, role)
            VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ssss",
        $username,
        $email,
        $hashedPassword,
        $role
    );

    if (mysqli_stmt_execute($stmt)) {

        echo "Registration successful!";

    } else {

        echo "Error: " . mysqli_error($conn);

    }

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Register - Adaptive Cybersecurity</title>
</head>

<body>

<h2>Create Account</h2>

<form method="POST" action="">

    <label>Username:</label>
    <input type="text" name="username" required>
    <br><br>

    <label>Email:</label>
    <input type="email" name="email" required>
    <br><br>

    <label>Password:</label>
    <input type="password" name="password" required>
    <br><br>

    <button type="submit">Register</button>

</form>

</body>
</html>
