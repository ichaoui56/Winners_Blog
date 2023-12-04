<?php
include("../db.inc.php");
if (isset($_POST["reset-request-submit"])) {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);

    $selector = bin2hex(random_bytes(8));
    // Random 32 binary bytes
    $token = random_bytes(32);
    $expiresDate = date("U") + 3600;
    $url = "blog.com/pages/create_new_password.inc.php?selector=" . $selector . "&validator=" . bin2hex($token);

    if (empty($email)) {
        echo "email is empty";
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
            $sql = "DELETE FROM passwordRecovery WHERE email=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "there is an error";
                exit;
            } else {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
            }
        } else {
            echo "the user isnt found";
            exit;
        }
        $email = $row["email"];
        // hashing the binary token and store it in db
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        $sql = "INSERT INTO passwordRecovery (pwd_reset_email, pwd_reset_selector, pwd_reset_token, pwd_reset_expires) VALUE ('$email', '$selector', '$hashedToken', '$expiresDate')";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close();

        $to = $email;
        $subject = "Reset Your Password!";
        $message = "<p>Click on The link below if you are the one trying to change your password,<br>if not you just ignore this mail and don share the link below.</p>
        <p>Here is your Password link: <br>";
        $message .= "<a href='$url'>$url</a></p>";
        $headers = "From: Avito Blog <avitoblog@avito.com>\r\n";
        $headers .= "Reply-To: avitoblog@avito.com\r\n";
        $headers .= "Content-type: text/html\r\n";
        mail($to, $subject, $message, $headers);
    header("Location: ../../pages/reset-password.php?reset=success");
    }
} else
    header("Location: ../../index.php");
