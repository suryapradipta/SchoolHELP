<?php
session_start();
include "connection.php";

if (isset($_POST['username']) != NULL) {
    $username = $_POST['username'];
    $password = ($_POST['password']);

    $query = ("SELECT * FROM user where username='$username' and password='$password'");
    $result = mysqli_query($connect, $query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['userid'] = $row["userid"];
            $_SESSION['fullname'] = $row["fullname"];
            $_SESSION['email'] = $row["email"];
            $_SESSION['phone'] = $row["phone"];
            $_SESSION['username'] = $row["username"];
            $_SESSION['password'] = $row["password"];
        }


        $adminLogin = ("SELECT * FROM schooladmin WHERE userid='" . $_SESSION['userid'] . "'");
        $dataAdmin = $connect->query($adminLogin);

        $checkUser = mysqli_num_rows($dataAdmin);

        if ($checkUser > 0) {
            while ($row = $dataAdmin->fetch_assoc()) {
                $_SESSION['staffid'] = $row["staffid"];
                $_SESSION['position'] = $row["position"];
                $_SESSION['userid'] = $row["userid"];
                $_SESSION['schoolid'] = $row["schoolid"];

                $getschoolname = ("SELECT * FROM school WHERE schoolid='" . $_SESSION['schoolid'] . "'");
                $schoolname = $connect->query($getschoolname);
                while ($row = $schoolname->fetch_assoc()) {
                    $_SESSION['schoolname'] = $row["schoolname"];
                }


                $_SESSION['loginas'] = 'administrator';
            }

        } else {
            $volunteerLogin = ("SELECT * FROM volunteer WHERE userid='" . $_SESSION['userid'] . "'");
            $dataVolunteer = $connect->query($volunteerLogin);
            while ($row = $dataVolunteer->fetch_assoc()) {
                $_SESSION['dateofbirth'] = $row["dateofbirth"];
                $_SESSION['occupation'] = $row["occupation"];

                $_SESSION['loginas'] = 'volunteer';
            }
        }

        if ($_SESSION['loginas'] == 'administrator') {
            header("location:../home-administrator.php");
        } else {
            header("location:../home-volunteer.php");
        }

    } else {
        header("location:../login.php?login-message=login-failed");
    }
}
?>