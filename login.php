<<<<<<< HEAD
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
=======
>>>>>>> 2905c04a9f5473494e641f51f3a3a90f881ecf9f

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>bloge</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body class="auth-page">
    <div class="auth-card">
        <h2>Login</h2>

        <?php if ($error): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <button type="submit" name="clicke">Login</button>
        </form>

        <p>Don&apos;t have an account? <a href="register.php">Create one here</a></p>
    </div>
=======
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
     <form action="">
        <label for="">Name</label>
        <input type="text" name="name" id=""><br>
        <label for="">Email</label>
        <input type="email" name="email" id=""><br>
        <label for="">Password</label>
        <input type="password" name="poassword" id=""><br>
        <button type="submit" name="clicke">login</button>
     </form>
>>>>>>> 2905c04a9f5473494e641f51f3a3a90f881ecf9f
</body>
</html>