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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Articles - Blog</title>
    <link rel="stylesheet" href="../assets/css/aericle.css">
</head>
<body>

    <nav class="navbar">
        <div class="nav-brand">Welcome to my blog</div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="articles.php" class="active">Articles</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>

    <div class="container">
        <header class="page-header">
            <h1>All Articles</h1>
        </header>

        <div class="articles-grid">
            <?php 
            if($posts) {
                foreach($posts as $art) {
            ?>
                <article class="post-card">
                    <h2 class="post-card__title"><?php echo htmlspecialchars($art['title']); ?></h2>
                    
                    <div class="post-card__meta">
                        <span><?php echo htmlspecialchars($art['name_user']); ?></span>
                        <span><?php echo htmlspecialchars($art['name_catalog']); ?></span>
                        <span><?php echo date('M d, Y', strtotime($art['date_publication'])); ?></span>
                    </div>

                    <p class="post-card__excerpt"><?php echo htmlspecialchars(mb_substr($art['contenu'], 0, 120)); ?>...</p>
                    
                    <a class="read-more" href="article_detail.php?id=<?php echo $art['id_article']; ?>">
                        Read More
                    </a>
                </article>
            <?php 
                } 
            } else {
                echo '<div class="empty-state">No articles found at the moment.</div>';
            }
            ?>
        </div>
    </div>

</body>
</html>
