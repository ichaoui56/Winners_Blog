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

function getAllUsers() {

    $output = array();
    $sql = "SELECT * FROM user";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($res)) {
        $output = $row;
    }
    return ($output);
}

function getAllArticles() {

    $output = array();
    $sql = "SELECT * FROM article";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($res)) {
        $output = $row;
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
        $output = $row;
    }
    return ($output);
}

function getArticleSpecific($userId) {


    $output = array();
    $sql = "SELECT * FROM article WHERE creator_id=?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($res)) {
        $output = $row;
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
        $output = $row;
    }
    return ($output);
}