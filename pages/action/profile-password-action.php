<?php

include 'connection.php';

$userid = $_POST ['userid'];
$password_repeat = $_POST ['password_repeat'];
$password = $_POST ['password'];


if ($password != $password_repeat) {
    header("location:../profile.php?password-message=update-password-match");
} else {
    $sql = mysqli_query($connect, "update user set password='$password'
            where userid='$userid'");
    if ($sql) {
        header("location:../profile.php?password-message=update-password-success");
    } else {
        header("location:../profile.php?password-message=update-password-fail");
    }
}
?>