<?php
session_start();
// DATABASE CONNECTION
include 'connection.php';

$currentdate = date("Y-m-d");

$tutorialdescription = $_POST['tutorialdescription'];
$tutorialdate = $_POST['tutorial_date'];
$tutorialtime = $_POST['tutorial_time'];
$studentlevel = $_POST['student_level'];
$studentnumber = $_POST['studentnum'];
$schoolid = $_SESSION['schoolid'];

$sql = mysqli_query($connect, "INSERT INTO `request` (`schoolid`, `requestid`, `requestdate`, `requeststatus`, `description`)
    VALUES ('$schoolid', NULL, '$currentdate', 'NEW', '$tutorialdescription')");

$lastid = $connect->insert_id;

$sql = mysqli_query($connect, "INSERT INTO `tutorialrequest` (`requestid`, `proposeddate`, `proposedtime`, `studentlevel`, `numstudents`) 
    VALUES ('$lastid', '$tutorialdate', '$tutorialtime', '$studentlevel', '$studentnumber')");

header("location:../submit-request.php?submit-message=submit-success");
?>