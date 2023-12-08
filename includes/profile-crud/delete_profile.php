<?php

include("../db.inc.php");

session_start();



if (isset($_SESSION["user_id"])) {
    $userId = $_SESSION["user_id"];
    $Delete_sql = "DELETE FROM User WHERE id_user = ?";

    $stmt = mysqli_prepare($conn, $Delete_sql);
    mysqli_stmt_bind_param($stmt, "i",$userId);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        session_destroy();
        header('location: ../../pages/login.php');
        exit();
    }
} else {
    echo "Error in deleting account.";
}
