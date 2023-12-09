<?php 
    session_start();
    include "../includes/db.inc.php";
    $comment = $_POST["text_cmt"];
    $date_cmt = date('Y-m-d H:i:s');
    $userId = $_SESSION["user_id"];
    echo $_SESSION["user_id"] . "jelllllll";
    $sql = "INSERT INTO comment (text_cmt, date_cmt, creator_id) 
    VALUES 
     ('$comment', '$date_cmt', '$userId')";
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>