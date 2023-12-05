<?php
include("./db.inc.php");

if (isset($_POST["signup_submit"])) {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $passwordRepeat = filter_input(INPUT_POST, "password-repeat", FILTER_SANITIZE_SPECIAL_CHARS);
    $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_NUMBER_INT);
    $userPicture = $_FILES["user-picture"]["tmp_name"];

    if (empty($username)) {
        echo "<br>$username<br>";
        echo "username is empty";
        exit;
    } else if (empty($email)) {
        echo "email is empty";
        exit;
    } else if (empty($password) || empty($passwordRepeat)) {
        echo "password is empty";
        exit;
    } else if (empty($phone)) {
        echo "phone is empty";
        exit;
    } else if ($password !== $passwordRepeat) {
        echo "the passwords is not the same";
        exit;
    }

    $userPicture = file_get_contents($userPicture);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (user_name, user_phone, user_email, user_picture, password) VALUE (?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "there is an error " . mysqli_error($conn);
        exit;
    } else {
        mysqli_stmt_bind_param($stmt, "sisss", $username, $phone, $email, $userPicture, $hashedPassword);
        mysqli_stmt_execute($stmt);
        header("Location: ../pages/login.php?signup=success");
    }
    mysqli_stmt_close($stmt);
} else
    header("Location: ../index.php");
