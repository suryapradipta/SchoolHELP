<?php

// DATABASE CONNECTION
include 'connection.php';

// capture data submitted from forms
$userid = $_POST ['userid'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$staffid = $_POST['staffid'];
$position = $_POST['position'];

echo "userid = " . $userid . "\n";
echo "fullname = " . $fullname . "\n";
echo "email = " . $email . "\n";
echo "phone = " . $phone . "\n";
echo "staffid = " . $staffid . "\n";
echo "position = " . $position . "\n";


$sql = mysqli_query($connect, "update user set fullname='$fullname',
                email='$email',
                phone='$phone'
            where userid='$userid'");

$sql2 = mysqli_query($connect, "update schooladmin set position='$position',
                       staffid = '$staffid'
            where staffid='$staffid'");

if ($sql2) {
//    echo "SUCCESS!!!!";
    header("location:../profile.php?message=update-profile-success");
} else {
//    echo 'FAILED!!!!!';
    header("location:../profile.php?message=update-profile-success");
}


?>