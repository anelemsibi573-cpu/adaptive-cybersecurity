<?php

session_start();

include "../includes/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT id, username, email, password, role 
            FROM users 
            WHERE email = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "s", $email);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($user = mysqli_fetch_assoc($result)) {

        if (password_verify($password, $user["password"])) {

            session_regenerate_id(true);

            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["role"] = $user["role"];

            if ($user["role"] == "admin") {
    header("Location: ../admin/admin_dashboard.php");
} else {
    header("Location: dashboard.php");
}

exit();

        }

    }

    echo "Invalid email or password.";

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Login - Adaptive Cybersecurity</title>

</head>

<body>

<h2>Login</h2>

<form method="POST" action="">

    <label>Email:</label>

    <input type="email" name="email" required>

    <br><br>

    <label>Password:</label>

    <input type="password" name="password" required>

    <br><br>

    <button type="submit">Login</button>

</form>

</body>

</html>