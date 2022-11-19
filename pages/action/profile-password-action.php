<?php

// DATABASE CONNECTION
include 'connection.php';

// capture data submitted from forms
$userid = $_POST ['userid'];
$password_repeat = $_POST ['password_repeat'];
$password = $_POST ['password'];

if ($password != $password_repeat) {
    header("location:../profile.php?message=update-password-match");
} else {
    $sql = mysqli_query($connect, "update user set password='$password'
            where userid='$userid'");
    if ($sql) {
//        echo "SUCCESS!!!!";
    header("location:../profile.php?message=update-password-success");
    } else {
//        echo 'FAILED!!!!!';
    header("location:../profile.php?message=update-password-fail");
    }

}


?>