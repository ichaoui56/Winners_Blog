<?php

session_start();
include("./db.inc.php");

if (isset($_POST['submit'])) {
    $article_title = $_POST["article_title"];
    $article_description = $_POST["article_description"];
    $category_id = $_POST["article_category"];
    $article_picture = file_get_contents($_FILES['article_picture']['tmp_name']);
    $date = date("F, j, Y"); 
    $user_id = $_SESSION["user_id"];


    $query = "INSERT INTO article (title, description, category_id, article_picture, article_date, creator_id) VALUES ('$article_title', '$article_description', '$category_id', ?, '$date', '$user_id')";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt, "s", $article_picture);
    mysqli_stmt_execute($stmt);

    header('Location: ../pages/add_article.php?article=added');

}

?>