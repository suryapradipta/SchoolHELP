<?php

// DATABASE CONNECTION
include 'connection.php';
session_start();

// capture data submitted from forms
$userid = $_POST ['userid'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$staffid = $_POST['staffid'];
$position = $_POST['position'];

$password =  $_POST['password'];

echo "userid = " . $userid . "\n";
echo "fullname = " . $fullname . "\n";
echo "email = " . $email . "\n";
echo "phone = " . $phone . "\n";
echo "staffid = " . $staffid . "\n";
echo "position = " . $position . "\n";
//echo "password=".$password;


$sql1 = mysqli_query($connect, "update user set fullname='$fullname',
                email='$email',
                phone='$phone'
            where userid='$userid'");

$updatestaffid = mysqli_query($connect, "update schooladmin set 
                       staffid = '$staffid'
            where position='$position'");


$updateposition = mysqli_query($connect, "update schooladmin set 
                       position = '$position'
            where staffid='$staffid'");




if ($updatestaffid or $sql1) {
//    echo "SUCCESS!!!!";
    $_SESSION['staffid'] = $staffid;
    header("location:../profile.php?message=update-profile-success");
    if ($updateposition) {
        header("location:../profile.php?message=update-profile-success");
    }
} else {
//    echo 'FAILED!!!!!';
    header("location:../profile.php?message=update-profile-fail");
}


?>