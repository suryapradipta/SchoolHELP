<?php

include 'connection.php';

$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$occupation = $_POST['occupation'];
$dateofbirth = $_POST['dateofbirth'];

// validate username whether already used or not
$validuser = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM user WHERE username='$username'"));
if ($validuser == 0){
    //get username, password, fullname, email, phone, and auto id
    $sql = mysqli_query($connect, "INSERT INTO `user` (`userid`, `username`, `password`, `fullname`, `email`, `phone`) 
    VALUES (NULL, '$username', '$password', '$fullname', '$email', '$phone')");

    $lastid = $connect->insert_id;

    //get id, date, and occupation
    $sql2 = mysqli_query($connect, "INSERT INTO `volunteer` (`userid`, `dateofbirth`, `occupation`) 
    VALUES ('$lastid', '$dateofbirth', '$occupation')");
    
    header("location:../register-volunteer.php?message=register-success");
}
else{
    header("location:../register-volunteer.php?message=username-taken");
}

?>