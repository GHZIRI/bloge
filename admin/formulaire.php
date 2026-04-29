<?php
session_start();
require_once "../core/db.php";
require_once "../core/article.php";

$database = new Database();
$db = $database->getConnection();

$article = new Article($db);

if(isset($_POST["add"])){
    $article->title = $_POST['title'];
    $article->contenu = $_POST['contenu'];
    $article->status = 'published';
    $article->date_publication = date('Y-m-d H:i:s');
    
    $article->id_user = 1; 
    $article->id_catalog = 1;

    if($article->create()){
        header("Location: home.php");
        exit();
    } else {
        echo "<p style='color:red;'>Problem with the add-on!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/formulaire.css?v=2">
    <title>Blog</title>
</head>
<body>
    <nav class="admin-navbar">
        <div class="admin-brand">&#9881; Admin Dashboard</div>
        <?php if (isset($_SESSION['user_name'])): ?>
            <div class="nav-user">
                <span class="user-icon">&#128100;</span>
                <span class="user-name"><?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                <a href="../logout.php" class="logout-link">Logout</a>
            </div>
        <?php endif; ?>
    </nav>
    <div class="form-page">
        <div class="form-card">
            <header class="form-card__header">
                <h1>Ajouter un article</h1>
            </header>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input id="title" class="input-field" type="text" name="title" required>
                </div>
                <div class="form-group">
                    <label for="contenu">Content</label>
                    <textarea id="contenu" class="textarea-field" name="contenu" required></textarea>
                </div>
                <div class="form-actions">
                    <button class="btn" type="submit" name="add">Add new article</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>