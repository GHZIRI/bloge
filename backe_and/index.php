<?php
require_once "db.php";
require_once "article.php";

$database = new Database();
$db = $database->getConnection();

$articleObj = new Article($db);
$posts = $articleObj->read(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog Index</title>
    <style>
        .post { border: 1px solid #ccc; padding: 15px; margin: 10px 0; }
        .link { color: blue; text-decoration: none; }
    </style>
</head>
<body>

    <h1>Articles List</h1>

    <?php foreach($posts as $art): ?>
        <div class="post">
            <h2><?php echo $art['title']; ?></h2>
            <p><?php echo substr($art['contenu'], 0, 100); ?>...</p>
            <a href="article_detail.php?id=<?php echo $art['id_article']; ?>" class="link">
                Read More
            </a>
        </div>
    <?php endforeach; ?>

</body>
</html>