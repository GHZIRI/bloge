<?php
session_start();
require_once "../core/db.php";
require_once "../core/article.php";

$database = new Database();
$db = $database->getConnection();
$articleObj = new Article($db);


if(isset($_GET['id'])) {
    $art = $articleObj->readOne($_GET['id']);
    if(!$art) {
        header("Location: home.php");
        exit();
    }
} else {
    header("Location: home.php");
    exit();
}
if(isset($_POST['update'])) {
    $articleObj->id_article = $_POST['id'];
    $articleObj->title = $_POST['title'];
    $articleObj->contenu = $_POST['contenu'];
    $articleObj->status = 'published';
    $articleObj->date_publication = date('Y-m-d H:i:s');
    $articleObj->id_user = 1;
    $articleObj->id_catalog = 1;

    if($articleObj->update()) {
        header("Location: home.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../assets/css/formulaire.css?v=2">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <nav class="admin-navbar">
        <div class="admin-brand">&#9881; Admin Dashboard</div>
        <?php if (isset($_SESSION['user_name'])){ ?>
            <div class="nav-user">
                <span class="user-icon">&#128100;</span>
                <span class="user-name"><?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                <a href="../logout.php" class="logout-link">Logout</a>
            </div>
        <?php } ?>
    </nav>
    <div class="form-page">
        <div class="form-card">
            <header class="form-card__header">
                <h1>Modifier l'article</h1>
            </header>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($art['id_article']); ?>">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input id="title" class="input-field" type="text" name="title" value="<?php echo htmlspecialchars($art['title']); ?>">
                </div>
                <div class="form-group">
                    <label for="contenu">Content</label>
                    <textarea id="contenu" class="textarea-field" name="contenu" rows="5"><?php echo htmlspecialchars($art['contenu']); ?></textarea>
                </div>
                <div class="form-actions">
                    <button class="btn" type="submit" name="update">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>