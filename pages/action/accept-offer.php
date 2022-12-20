<?php

include 'connection.php';

$offerid = $_POST['offerid'];

mysqli_query($connect, "UPDATE offer SET offerstatus = 'ACCEPTED' WHERE offerid = '$offerid'");


?>