<?php
session_start();
// DATABASE CONNECTION
include 'connection.php';

$currentdate = date("Y-m-d");

$resourcedescription = $_POST['resourcedescription'];
$resourcenum = $_POST['resourcenum'];
$resourcetype = $_POST['resourcetype'];
$schoolid = $_SESSION['schoolid'];

$sql = mysqli_query($connect, "INSERT INTO `request` (`schoolid`, `requestid`, `requestdate`, `requeststatus`, `description`)
    VALUES ('$schoolid', NULL, '$currentdate', 'NEW', '$resourcedescription')");

$lastida = $connect->insert_id;

$sql2 = mysqli_query($connect, "INSERT INTO `resourcerequest` (`requestid`, `resourcetype`, `numrequired`)
    VALUES ('$lastida', '$resourcetype', '$resourcenum')");

header("location:../submit-request.php?submit-resource-message=resource-success");
?>