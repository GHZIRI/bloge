<?php

require_once "db.php";
require_once "article.php";

$database = new Database();
$conn = $database->getConnection();

$article = new Article($conn);
$article1 = $article->read();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <div class="article-summary">
    <h2><?php echo $art['title']; ?></h2>
    
    <p><?php echo substr($art['contenu'], 0, 120); ?>...</p> 
    
    <a href="article_full.php?id=<?php echo $art['id_article']; ?>" class="btn">إقرأ المقال كاملاً</a>
</div>
</body>
</html>
