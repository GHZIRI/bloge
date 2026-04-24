<?php

require_once "db.php";
require_once "article.php";

if(isset($_POST["add"])){
        $article = new Article($conn);

        $article->title = $_POST['title'];
        $article->contenu = $_POST['contenu'];
        $article->status = 'published';
        $article->date_publication = date('y-m-y');

        if($article->create()){
            echo "<p style='color:green>The article was successfully added </p>";
        }else{
            echo "<p style='color:red'>Problem with the add-on!</p>";
        }
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <form action="" method="POST">
        <label for="">Title</label>
        <input type="text" name= "title">
        <br>
        <label for="">Content</label>
        <textarea name="contenu" id=""></textarea>
        <br>
        <label for="">Author</label>
        <input type="text" name= "author">
        <br>
        <button type="submit" name="add">Add new article</button>
     </form>
</body>
</html>