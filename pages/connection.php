<?php
$host="localhost";
$user="root";
$password="";
$db="schoolHELP";

$connect = mysqli_connect($host,$user,$password,$db);
if (!$connect){
    die("Connection Failed:".mysqli_connect_error());
}

?>