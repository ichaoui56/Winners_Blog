<?php 
    include "../includes/db.inc.php";
    $comment = $_POST["text_cmt"];
    $date_cmt = date('Y-m-d H:i:s');
    $sql = "INSERT INTO comment (text_cmt, date_cmt) VALUES ('$comment', '$date_cmt')";
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>