<?php
require_once "../core/db.php";
require_once "../core/article.php";

$database = new Database();
$db = $database->getConnection();
$articleObj = new Article($db);

if(isset($_GET['id'])) {
    $articleObj->id_article = $_GET['id'];

    if($articleObj->delete()) {
        header("Location: home.php");
        exit();
    }
}

header("Location: home.php");
exit();
?>