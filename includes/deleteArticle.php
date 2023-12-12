<?php
include("db.inc.php");
if (isset($_GET["articleId"])) {

    $articleId = intval($_GET["articleId"]);
    $date = date("Y-m-d H:i:s");
    $sql = "UPDATE article SET soft_delete='$date' WHERE id_article='$articleId'";
    $stmt = mysqli_stmt_init($conn);

    mysqli_stmt_prepare($stmt, $sql);

    if (mysqli_stmt_execute($stmt)) {

        header("Location: ./admin/admin.php?artile=deleted");
    } else {
        echo "<script>alert('matamsa7ch')</script>";
    }
} else {
    header("Location: ../index.php");
}
