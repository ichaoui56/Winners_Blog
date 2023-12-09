<?php


function getSpecificUser($userId, $conn)
{
    $sql = "SELECT * FROM user WHERE id_user=?";

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($res);

    return ($row);
}

function getAllUsers()
{

    $output = array();
    $sql = "SELECT * FROM user";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($res)) {
        $output[] = $row;
    }
    return ($output);
}

function getAllArticles($conn)
{

    $output = array();
    $sql = "SELECT a.id_article, a.title, a.description, a.article_picture, a.article_date, a.creator_id, a.soft_delete,
    c.id_category, c.category FROM Article a LEFT JOIN Category c ON a.category_id = c.id_category";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($res)) {
        $output[] = $row;
    }
    return ($output);
}

function getArticle($articleId)
{

    $output = array();
    $sql = "SELECT * FROM article WHERE id_article=?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $articleId);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($res)) {
        $output[] = $row;
    }
    return ($output);
}

function getArticleSpecific1($userId, $conn)
{


    $output = array();
    $sql = "SELECT * FROM article WHERE creator_id=?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($res)) {
        $output[] = $row;
    }
    return ($output);
}


function getcomments($articleID)
{

    $output = array();
    $sql = "SELECT * FROM article WHERE article_id=?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $articleID);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($res)) {
        $output[] = $row;
    }
    return ($output);
}

function getArticleSpecific($userId, $conn)
{
    $sql = "SELECT a.id_article, a.title, a.description, a.article_picture, a.article_date, a.creator_id, a.soft_delete,
       c.id_category, c.category
FROM Article a
LEFT JOIN Category c ON a.category_id = c.id_category
WHERE a.creator_id = ?
";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $articles = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $articles[] = $row;
    }

    mysqli_stmt_close($stmt);

    return $articles;
}

function getCommentCount($conn, $articleID)
{
    $sql = "SELECT * FROM comment WHERE article_id=?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $articleID);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $count = mysqli_num_rows($res);
    return $count;
}
