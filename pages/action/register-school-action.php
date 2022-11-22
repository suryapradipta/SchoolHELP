<?php

include 'connection.php';

$schoolname = $_POST['schoolname'];
$address = $_POST['address'];
$city = $_POST['city'];

$validschool = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM school WHERE 
                         schoolname='$schoolname' and 
                         address='$address' and 
                         city='$city' "));

if ($validschool === 0) {
    $sql = mysqli_query($connect, "INSERT INTO school(`schoolname`, `address`, `city`)
        VALUES('$schoolname','$address','$city')");
    if ($sql) {
        header("location:../register-school.php?school-message=school-success");
    } else {
        header("location:../register-school.php?school-message=school-fail");
    }
} else {
    header("location:../register-school.php?school-message=invalid-school");
}

?>