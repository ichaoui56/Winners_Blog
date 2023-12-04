<?php
include("./db.inc.php");

if (isset($_POST["sigin_submit"])) {
    $email = filter_input($_POST["email"], FILTER_SANITIZE_EMAIL);
    $password = filter_input($_POST["password"], FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($email)) {
        echo "email is empty";
        exit;
    } else if (empty($password)) {
        echo "password is empty";
        exit;
    }

    $sql = "SELECT * FROM user WHERE user_email=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "there is an error";
        exit;
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($res)) {
            $hashedPassword = $row["password"];
            if (password_verify($password, $hashedPassword)) {
                header("Location: ../index.php?login=success");
            } else {
                header("Location: ../index.php?login=failed");
            }
        } else {
            echo "the user isnt found";
            exit;
        }
    }
} else
    header("Location: ../index.php");
