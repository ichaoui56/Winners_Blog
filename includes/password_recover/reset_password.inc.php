<?php

if (isset($_POST["reset-password-submit"])) {
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $passwordRepeat = filter_input(INPUT_POST, "password-repeat", FILTER_SANITIZE_SPECIAL_CHARS);

    $selector = $_POST["selector"];
    $validator = hex2bin($_POST["validator"]);
    $actualDate = date("U");
    if (empty($password) || empty($passwordRepeat)) {
        echo "password is empty";
        exit;
    } else if ($password !== $passwordRepeat) {
        echo "the passwords is not the same";
        exit;
    }

    $sql = "SELECT * FROM passwordRecovery WHERE pwd_reset_selector='$selector'";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($res);
    $hashedValidator = $row["pwd_reset_token"];
    $expiresDate = $row["pwd_reset_expires"];
    if (!password_verify($validator, $hashedValidator) && $actualDate <= $expiresDate) {
        header("Location: ../index.php?passwdReset=failed");
    } else {
        $user_email = $row["pwd_reset_email"];
        $newHashedPsswd = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE user SET password=? WHERE user_email='$user_email'";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "There is an error";
        } else {
            mysqli_stmt_bind_param($stmt, "s", $newHashedPsswd);
            mysqli_stmt_execute($stmt);
            $sql = "DELETE FROM passwordRecovery WHERE pwd_reset_email='$user_email'";
            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_execute($stmt);
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close();
} else
    header("Location: ../index.php");


?>



<?php
// this is for the password recover form
$selector = $_GET["selector"];
$validator = $_GET["validator"];
if (empty($selector) || empty($validator)) {
    echo "Could not validate your request";
} else {
    if (ctype_xdigit($selector) && ctype_xdigit($selector)) {
?>
        <form action="../includes/password_recover/reset_password.inc.php" method="post">
            <input type="hidden" name="validator" value="<?php echo $validator; ?>">
            <input type="hidden" name="selector" value="<?php echo $selector; ?>">
        </form>
<?php
    } else {
        header("Location: ../index.php");
    }
}
?>