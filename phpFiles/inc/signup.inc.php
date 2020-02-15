<?php
if (isset($_POST["singUp"])) {
    require 'dbh.inc.php';
    require 'functions.inc.php';
    $userName = $_POST["userName"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (!validate_string($userName) && !validate_email($email)) {
        header("Location: ../loginSingUp.php?error=invaliduseremail");
        exit();
    } else if (!validate_string($userName)) {
        header("Location: ../loginSingUp.php?error=invaliduser&email=" . $email);
        exit();
    } else if (!validate_email($email)) {
        header("Location: ../loginSingUp.php?error=invalidmail&user=" . $userName);
        exit();
    } else {
        $sql = "SELECT userName FROM users WHERE userName=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../loginSingUp.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $userName);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../loginSingUp.php?error=invaliduser&email=" . $email);
                exit();
            } else {
                $sql = "INSERT INTO users (userName,email,password) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../loginSingUp.php?error=sqlerror");
                    exit();
                } else {
                    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $userName, $email, $hashedpwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../home.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../loginSingUp.php");
    exit();
}
