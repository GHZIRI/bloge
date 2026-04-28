<?php
require_once "../core/db.php";
require_once "../core/article.php";

$database = new Database();
$db = $database->getConnection();
$articleObj = new Article($db);
$posts = $articleObj->read(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../assets/css/index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
<button class="logout-btn" onclick="window.location.href='../logout.php'">Logout</button>   
    <div class="page">
        <header class="page-header">
            <h1>My Blog Articles</h1>
            <a class="btn btn--primary" href="../admin/formulaire.php">+ Add New Article</a>
        </header>

        <div class="articles-grid">
            <?php 
            if($posts) {
                foreach($posts as $art) {
            ?>
                <article class="post-card">
                    <h2 class="post-card__title"><?php echo htmlspecialchars($art['title']); ?></h2>
                    <p class="post-card__meta">By <?php echo htmlspecialchars($art['name_user']); ?> • <?php echo date('F j, Y', strtotime($art['date_publication'])); ?></p>
                    <p class="post-card__excerpt"><?php echo htmlspecialchars(mb_substr($art['contenu'], 0, 170)); ?>...</p>
                    <div class="post-card__actions">
                        <a class="btn btn--view" href="../views/article_detail.php?id=<?php echo $art['id_article']; ?>&source=admin">View</a>
                        <a class="btn btn--edit" href="../admin/update.php?id=<?php echo $art['id_article']; ?>">Update</a>
                        <a class="btn btn--delete" href="../admin/delete.php?id=<?php echo $art['id_article']; ?>" onclick="return confirm('Delete this article?')">Delete</a>
                    </div>
                </article>
            <?php 
                }
            } else {
            ?>
                <div class="empty-state">
                    <p>No articles yet.</p>
                </div>
            <?php }
            ?>
        </div>
    </div>
</body>
</html> 