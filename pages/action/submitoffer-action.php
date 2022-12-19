<?php
session_start();
// DATABASE CONNECTION
include 'connection.php';

$currentdate = date("Y-m-d");

$userid = $_SESSION['userid'];
$remarks = $_POST['remarks'];
$requestid = $_POST['input'];

$sql = mysqli_query($connect, "INSERT INTO `offer` (`offerid`,`userid`, `requestid`, `offerdate`, `remarks`, `offerstatus`)
    VALUES (NULL, '$userid', '$requestid', '$currentdate', '$remarks', 'PENDING')");

if($sql){
    header("location:../home-volunteer.php?submit-offer=offer-success");
}
else{
    header("location:../home-volunteer.php?submit-offer=offer-fail");
}
?>