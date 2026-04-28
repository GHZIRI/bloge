<?php
require_once "core/db.php";

$success = "";
$error = "";

if (isset($_POST["register"])) {
    $database = new Database();
    $db = $database->getConnection();

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $checkSql = "SELECT * FROM users WHERE email_user = :email";
    $checkStmt = $db->prepare($checkSql);
    $checkStmt->execute(['email' => $email]);

    if ($checkStmt->rowCount() > 0) {
        $error = "This email is already registered! <a href='login.php'>Login here</a>";
    } else {
        $sql = "INSERT INTO users (name_user, email_user, password_user) VALUES (:name, :email, :password)";
        $stmt = $db->prepare($sql);

        if ($stmt->execute(['name' => $name, 'email' => $email, 'password' => $password])) {
            $success = "Registration successful! <a href='login.php'>Login now</a>";
        } else {
            $error = "Error during registration.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body class="auth-page">
    <div class="auth-card">
        <h2>Create a new account</h2>

        <form action="" method="POST">
            <label>Name:</label>
            <input type="text" name="name" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <button type="submit" name="register">Register</button>
        </form>

        <p>Do you have an account? <a href="login.php">Log in here</a></p>
    </div>
</body>
</html>