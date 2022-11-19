<?php

// DATABASE CONNECTION
include 'connection.php';

// capture data submitted from forms
$userid = $_POST['userid'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$staffid = $_POST['staffid'];
$position = $_POST['position'];


// update data ke database
$sql = mysqli_query($connect,"update user set 
                fullname='$fullname', 
                email='$email',
                phone='$phone', 
                staffid='$staffid' 
            where userid='$userid'");




?>