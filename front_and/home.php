<?php

require_once "../backe_and/db.php";
require_once "../backe_and/article.php";


$database = new Database();
$conn = $database->getConnection();

$articleObj = new Article($conn); 
$articles = $articleObj->readLimit(5);
?>



<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
<head><title>Home Page</title></head>
<body>
    <h1>Latest Articles</h1>
    <?php foreach($articles as $art): ?>
        <div style="border-bottom: 1px solid #ccc; margin-bottom: 20px;">
            <h2><?php echo $art['title']; ?></h2>
            
            <p><?php echo substr($art['contenu'], 0, 150); ?>...</p>
            
            <a href="article_detail.php?id=<?php echo $art['id_article']; ?>">Read More</a>
        </div>
    <?php endforeach; ?>
</body>
</html>