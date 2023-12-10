<?php

session_start();
include("./db.inc.php");

if (isset($_POST['submit'])) {
    $article_titles = $_POST["article_title"];
    $article_descriptions = $_POST["article_description"];
    $category_ids = $_POST["article_category"];
    $user_id = $_SESSION["user_id"];

    $query = "INSERT INTO article (title, description, category_id, article_picture, creator_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    for ($i = 0; $i < count($article_titles); $i++) {
        $article_title = $article_titles[$i];
        $article_description = $article_descriptions[$i];
        $category_id = $category_ids[$i];
        $article_picture = '';

        // Check if a file was uploaded
        if (!empty($_FILES['article_picture']['tmp_name'][$i])) {
            $article_picture = file_get_contents($_FILES['article_picture']['tmp_name'][$i]);
        }

        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "ssisi", $article_title, $article_description, $category_id, $article_picture, $user_id);
            mysqli_stmt_execute($stmt);
        }
    }

    header('Location: ../pages/add_article.php?article=added');
}

?>
