<?php

require_once "../backe_and/db.php";
require_once "../backe_and/article.php";

$database = new Database();
$conn = $database->getConnection();

$articleOBJ = new Article($conn);

if(isset($_GET['id'])) {
    $id = (int)$_GET['id']; 
    $art = $articleObj->readOne($id);
    

    if(!$art){
        header("Location: home.php");
        exit();
    }
    else {
    
    header("Location: home.php");
    exit();
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $art['title']; ?></title>
</head>
<body>
        <div class="container">
        <h1><?php echo $art['title']; ?></h1>
        
        <p><small>Publié le: <?php echo $art['date_publication']; ?> | Status: <?php echo $art['status']; ?></small></p>
        
        <hr>

        <div class="content">
            <?php echo nl2br($art['contenu']); ?>
        </div>

        <br>
        <a href="home.php">Backe</a>
    </div>
</body>
</html>
</body>
</html>