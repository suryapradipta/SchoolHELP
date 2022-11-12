<?php
session_start();

include "connection.php";

$username = $_POST["username"];
$password = $_POST['password'];



if(isset($_POST['username']) != NULL){
    echo 12;
    $username = $_POST['username'];
    $password = ($_POST['password']);

    echo $username;
    echo $password;

    $query = ("SELECT * from User where username='$username' and password='$password'"); // get user

    $result = mysqli_query($connect, $query);
    echo "setelah 12";

    // $login = mysqli_query($connect, "SELECT * FROM user WHERE username='$username' and password='$password'");
    // $checkUser   = mysqli_num_rows($login);

    if($result ->num_rows > 0){
        echo 13;
        $dataUser = mysqli_fetch_assoc($query);

        while($row = $dataUser) {
            $_SESSION['id'] = $row["id"];
            $_SESSION['fullname'] = $row["fullname"];
            $_SESSION['email'] = $row["email"];
            $_SESSION['phone'] = $row["phone"];
        }

        $_SESSION['username'] = $username;
        $_SESSION['loginas'] = 'administrator';
    
        $adminLogin = ("SELECT * FROM SchoolAdmin WHERE id='". $_SESSION['id'] . "'"); // get detail admin user
            $dataAdmin = $connect->query($adminLogin);
            while($row = $dataAdmin->fetch_assoc()) {
                $_SESSION['staffid'] = $row["staffid"];
                $_SESSION['position'] = $row["position"];
                $_SESSION['id'] = $row["id"];
            }
        if($dataAdmin['position'] == "schoolHELPAdmin"){
            echo 14;
            header("location:home-administrator.php");
        }
        // else{
        //     header("location:home-patient.php");
        // }
    }
    else {
        echo "else";
        header("location:../login.php?message=fail");
    }

}
?>