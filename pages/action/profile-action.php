<?php
include 'connection.php';
session_start();

$userid = $_POST ['userid'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$schoolid = $_POST['schoolid'];
$staffid = $_POST['staffid'];
$position = $_POST['position'];


$validuser = mysqli_num_rows(mysqli_query($connect, "SELECT userid FROM user WHERE userid='$userid'"));

if ($validuser > 0) {
    $updateuser = mysqli_query($connect, "update user set fullname='$fullname',
                email='$email',
                phone='$phone'
            where userid='$userid'");
    if ($updateuser) {
        $_SESSION['fullname'] = $fullname;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        header("location:../profile.php?profile-message=update-profile-success");
    } else {
        header("location:../profile.php?profile-message=update-profile-fail");
    }
} else {
    header("location:../profile.php?profile-message=update-profile-fail");
}
$validstaffid = mysqli_num_rows(mysqli_query($connect, "SELECT staffid FROM schooladmin WHERE staffid='$staffid'"));

if ($validstaffid == 0) {
    $updatestaffid = mysqli_query($connect, "update schooladmin set
                           staffid = '$staffid'
                where schoolid='$schoolid'");
    if ($updatestaffid) {
        $_SESSION['staffid'] = $staffid;
        header("location:../profile.php?profile-message=update-profile-success");
    } else {
        header("location:../profile.php?profile-message=update-profile-fail");
    }
} else {
    header("location:../profile.php?profile-message=staff-id-failed");
}

$validschool = mysqli_num_rows(mysqli_query($connect, "SELECT schoolid FROM schooladmin WHERE schoolid='$schoolid'"));


if ($validschool > 0) {
    $updateposition = mysqli_query($connect, "update schooladmin set
                           position = '$position'
                where schoolid='$schoolid'");
    if ($validschool) {
        $_SESSION['position'] = $position;
        header("location:../profile.php?profile-message=update-profile-success");
    } else {
        header("location:../profile.php?profile-message=update-profile-fail");
    }
} else {
    header("location:../profile.php?profile-message=update-profile-fail");
}
?>