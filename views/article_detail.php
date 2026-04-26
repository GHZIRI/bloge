<?php
require_once "../core/db.php"; 
require_once "../core/article.php";

$database = new Database();
$conn = $database->getConnection();

$articleOBJ = new Article($conn);

$redirect_url = (isset($_GET['source']) && $_GET['source'] === 'admin') ? "../admin/home.php" : "index.php";

if(isset($_GET['id'])) {
    $id = (int)$_GET['id']; 
    $art = $articleOBJ->readOne($id); 

    if(!$art) {
        header("Location: " . $redirect_url);
        exit();
    }
    
} else {
    header("Location: " . $redirect_url);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../assets/css/aericle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($art['title']); ?></title>
</head>
<body>
    <div class="article-page">
        <header class="article-header">
            <h1><?php echo htmlspecialchars($art['title']); ?></h1>
        </header>

        <div class="article-meta">
            <span><strong>Author:</strong> <?php echo htmlspecialchars($art['name_user']); ?></span>
            <span><strong>Category:</strong> <?php echo htmlspecialchars($art['name_catalog']); ?></span>
            <span><strong>Date:</strong> <?php echo htmlspecialchars($art['date_publication']); ?></span>
        </div>

        <div class="article-content">
            <?php echo nl2br(htmlspecialchars($art['contenu'])); ?>
        </div>

        <a class="button" href="<?php echo htmlspecialchars($redirect_url); ?>">Back to Home</a>
    </div>
</body>
</html>