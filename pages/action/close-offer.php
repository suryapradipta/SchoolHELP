<?php

include 'connection.php';

$offerid = $_GET['offerid'];

mysqli_query($connect, "UPDATE offer SET offerstatus = 'CLOSED' WHERE offerid = '$offerid'");


?>