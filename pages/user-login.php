<?php
session_start();

include "connection.php";

$username = $_POST["username"];
$password = $_POST['password'];



if(isset($_POST['username']) != NULL){
    $username = $_POST['username'];
    $password = ($_POST['password']);

    $query = ("SELECT * FROM user where username='$username' and password='$password'"); // get user

    $result = mysqli_query($connect, $query);

    if($result ->num_rows > 0){

        while($row = $result -> fetch_assoc()) {
            $_SESSION['id'] = $row["id"];
            $_SESSION['fullname'] = $row["fullname"];
            $_SESSION['email'] = $row["email"];
            $_SESSION['phone'] = $row["phone"];
        }

        $_SESSION['username'] = $username;
    
        $adminLogin = ("SELECT * FROM schooladmin WHERE id='". $_SESSION['id'] . "'"); // get detail admin user
            $dataAdmin = $connect->query($adminLogin);
            while($row = $dataAdmin->fetch_assoc()) {
                $_SESSION['staffid'] = $row["staffid"];
                $_SESSION['position'] = $row["position"];
                $_SESSION['id'] = $row["id"];
            
                $_SESSION['loginas'] = 'administrator';
            }

            if($_SESSION['loginas'] == 'administrator') {
                header("location:home-administrator.php");
            }
            else {
                header("location:home-volunteer.php");
            }
            
    }
    else {
        echo "else";
        header("location:../login.php?message=fail");
    }

}
?>