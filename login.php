<?php
session_start();
require_once "core/db.php";

$error = ""; 

if (isset($_POST["clicke"])) {
    $database = new Database();
    $db = $database->getConnection();

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email_user = :email";
    $stmt = $db->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if ($password === $user["password_user"]) {
            $_SESSION["user_id"] = $user["id_user"];
            $_SESSION["user_name"] = $user["name_user"]; 
            $_SESSION["role"] = $user["role"];

            if ($user["role"] == 'admin') {
                header("Location: admin/home.php");
                exit();
            } else {
                header("Location: views/index.php");
                exit();
            }
        } else {
            $error = "Incorrect password!";
        }
    } else {
        
        $error = "Email not found. <a href='register.php'>Create an account here</a>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bloge</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body class="auth-page">
    <div class="auth-card">
        <h2>Login</h2>

        <?php if ($error){ ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php } ?>

        <form action="" method="POST">
            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <button type="submit" name="clicke">Login</button>
        </form>

        <p>Don&apos;t have an account? <a href="register.php">Create one here</a></p>
    </div>
</body>
</html>