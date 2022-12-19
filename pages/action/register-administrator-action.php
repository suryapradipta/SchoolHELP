<?php

// DATABASE CONNECTION
include 'connection.php';

$username = $_POST['username'];
$password = md5($_POST ['password']);
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$schoolid = $_POST['schoolid'];
$staffid = $_POST['staffid'];
$position = $_POST['position'];

$validschool = mysqli_num_rows(mysqli_query($connect, "SELECT schoolid FROM school WHERE schoolid='$schoolid'"));

if ($validschool > 0) {
    $validuser = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM user WHERE 
                       username='$username'"));
    if ($validuser == 0) {
        $validstaffid = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM schooladmin WHERE 
                       staffid='$staffid'"));
        if($validstaffid == 0) {
            $sql = mysqli_query($connect, "INSERT INTO user(username, password, fullname, email, phone)
        VALUES('$username','$password','$fullname', '$email', '$phone')");

            $lastuserid = $connect->insert_id;

            $sql2 = mysqli_query($connect, "INSERT INTO schooladmin(`userid`, `schoolid`, `staffid`, `position`)
        VALUES ('$lastuserid', '$schoolid', '$staffid', '$position')");
            if ($sql2) {
                header("location:../register-school.php?message=register-administrator-success");
            } else {
                header("location:../register-school.php?message=register-administrator-fail");
            }
        } else {
            header("location:../register-school.php?message=staffid-fail");

        }
    }else {
        header("location:../register-school.php?message=username-fail");
    }
}else {
    header("location:../register-school.php?message=invalid-school");
}

?>