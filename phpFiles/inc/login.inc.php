<?php
if (isset($_POST['singIn'])) {
    require 'dbh.inc.php';
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE userName=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../loginSingUp.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userName);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            $pwdCheck = password_verify($password, $row['password']);
            if ($pwdCheck == false) {
                header("Location: ../loginSingUp.php?error=wrongpwd");
                exit();
            } else if ($pwdCheck == true) {
                session_start();
                $_SESSION['userName'] = $row['userName'];
                $_SESSION['email'] = $row['email'];
                header("Location: ../home.php?login=success");
                exit();
            }
        } else {
            header("Location: ../loginSingUp.php?error=nouser");
            exit();
        }
    }
} else {
    header("Location: ../loginSingUp.php");
    exit();
}
