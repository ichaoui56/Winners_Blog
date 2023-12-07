<?php

session_start();
include("./db.inc.php");

if (isset($_POST['submit'])) {
    $article_title = $_POST["article_title"];
    $article_description = $_POST["article_description"];
    $article_category = $_POST["article_category"];
    $article_picture_name = $_FILES['article_picture']['name'];
    $article_picture_tmp = $_FILES['article_picture']['tmp_name'];

    move_uploaded_file($article_picture_tmp, "../pictures/$article_picture_name");

    $query = "INSERT INTO `article` (title, description, category, article_picture) VALUES ('$article_title', '$article_description', '$article_category', '$article_picture_name')";
    $result = mysqli_query($conn, $query);

    header('Location: ../pages/add_article.php');

}

?>