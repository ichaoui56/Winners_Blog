<?php
// Include your database connection here
include("../includes/db.inc.php");

if (isset($_GET['article_id'])) {
    $articleId = $_GET['article_id'];
    // Fetch comments based on the article ID
    $sqlCom = "SELECT * FROM comment WHERE article_id = '$articleId'";
    $comments = $conn->query($sqlCom);

    // Output comments as JSON
    $commentsArray = [];
    while ($row = $comments->fetch_assoc()) {
        $commentsArray[] = $row;
    }

    echo json_encode($commentsArray);
} else {
    echo "Invalid article ID";
}

