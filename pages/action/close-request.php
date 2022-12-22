<?php

include 'connection.php';

$viewid = $_GET['id'];

$sql= mysqli_query($connect, "UPDATE request SET requeststatus = 'CLOSED' WHERE requestid = '$viewid'");
//header("location:../select-offer.php?offer-message=offer-closed&id=$offerid");
header("location:../review-offers.php?request-message=request-closed");


?>