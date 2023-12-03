<?php
include("./db.inc.php");

if (isset($_POST["signup_submit"])) {
    $username = filter_input($_POST["username"], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input($_POST["email"], FILTER_SANITIZE_EMAIL);
    $password = filter_input($_POST["password"], FILTER_SANITIZE_SPECIAL_CHARS);
    $passwordRepeat = filter_input($_POST["password-repeat"], FILTER_SANITIZE_SPECIAL_CHARS);
    $phone = filter_input($_POST["phone"], FILTER_SANITIZE_SPECIAL_CHARS);
    $userPicture = file_get_contents($_FILES["user-picture"]["tmp_name"]);

    if (empty($username)) {
        echo "username is empty";
    } else if (empty($email)) {
        echo "email is empty";
    } else if (empty($password) || empty($passwordRepeat)) {
        echo "password is empty";
    } else if (empty($phone)) {
        echo "username is empty";
    } else if (empty($userPicture)) {
        echo "username is empty";
    } else if ($password !== $passwordRepeat) {
        echo "the passwords is not the same";
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (user_name, user_phone, user_email, user_picture, password) VALUE (?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "there is an error";
        exit;
    } else {
        mysqli_stmt_bind_param($stmt, "sisss", $username, $phone, $email, $userPicture, $hashedPassword);
        mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
} else
    header("Location: ../index.php");
