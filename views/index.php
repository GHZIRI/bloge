<?php
require_once "../core/db.php";
require_once "../core/article.php";

$database = new Database();
$db = $database->getConnection();

$articleObj = new Article($db);
$all_posts = $articleObj->read(); 
$posts = array_slice($all_posts, 0, 3); 
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Explore Articles</title>
    <link rel="stylesheet" href="../assets/css/home.css">
</head>
<body>
    <header>
        <h1>Welcome to my blog</h1>
        <p>Explore the latest articles on technology, education, and storytelling.</p>
    </header>

    <nav class="navbar">
        <ul class="nav-links">
            <li><a href="index.php" class="<?php echo $currentPage === 'index.php' ? 'active' : ''; ?>">Home</a></li>
            <li><a href="articles.php" class="<?php echo $currentPage === 'articles.php' ? 'active' : ''; ?>">Articles</a></li>
            <li><a href="contact.php" class="<?php echo $currentPage === 'contact.php' ? 'active' : ''; ?>">Contact</a></li>
        </ul>
    </nav>

    <main>


    <div class="container">
        <h2>Explore Our Blog</h2>

        <div class="articles-grid">
            <?php 
            if($posts) {
                foreach($posts as $art) {
            ?>
                <article class="post-card">
                    <h3 class="post-card__title"><?php echo htmlspecialchars($art['title']); ?></h3>
                    
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
</main>

</body>
</html>