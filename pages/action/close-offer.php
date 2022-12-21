<?php

include 'connection.php';

$offerid = $_GET['offerid'];

$sql= mysqli_query($connect, "UPDATE offer SET offerstatus = 'CLOSED' WHERE offerid = '$offerid'");
header("location:../select-offer.php?offer-message=offer-closed&id=$offerid");


?>