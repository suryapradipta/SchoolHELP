<?php

// DATABASE CONNECTION
include 'connection.php';

// capture data submitted from forms
$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$staffid = $_POST['staffid'];
$position = $_POST['position'];

//$login = mysqli_query($connect,
//    "SELECT * FROM user WHERE
//                       username='$username' and
//                         password='$password' and
//                         fullname='$fullname' and
//                         email='$email' and
//                         phone='$phone'
//                         ");
$validuser = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM user WHERE 
                       username='$username' and
                         password='$password'
"));

$sql = mysqli_query($connect, "INSERT INTO user(username, password, fullname, email, phone)
        VALUES('$username','$password','$fullname', '$email', '$phone')");

//header("location:../register-school.php");



if ($validuser->num_rows > 0) {
    while ($row = $validuser->fetch_assoc()) {
        $_SESSION['userid'] = $row["userid"];

    }
}


?>