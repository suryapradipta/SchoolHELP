<?php

include 'connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../assets/phpmailer/src/Exception.php';
require '../../assets/phpmailer/src/PHPMailer.php';
require '../../assets/phpmailer/src/SMTP.php';

$offerid = $_POST['offerid'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$description = $_POST['description'];
$datenow = $_POST['datenow'];
$offerdate = $_POST['offerdate'];
$remarks = $_POST['remarks'];


//$adminemail = $_SESSION['email'];
$adminfullname = $_SESSION['adminfullname'];

echo $adminfullname;


$sql = mysqli_query($connect, "UPDATE offer SET offerstatus = 'ACCEPTED' WHERE offerid = '$offerid'");

$mailvolunteer = new PHPMailer(true);
try {
    $mailvolunteer->isSMTP();
    $mailvolunteer->Host = 'smtp.gmail.com';
    $mailvolunteer->SMTPAuth = true;
    $mailvolunteer->Username = 'suryapradipta8@gmail.com';
    $mailvolunteer->Password = 'oqtpvfhwyadwcrpi';
    $mailvolunteer->SMTPSecure = 'ssl';
    $mailvolunteer->Port = 465;


    // Sender
    $mailvolunteer->setFrom('suryapradipta8@gmail.com', 'The School HELP Team');

    // Recipient
    $mailvolunteer->addAddress($email, $fullname);


//Content
    $mailvolunteer->isHTML(true);
    $mailvolunteer->Subject = "Your ". $description . " Offer has been Accepted!";
    $bodyvolunteer =  nl2br(
        "Hi $fullname,

        $description Offer accepted with $adminfullname on $datenow. Please find the details below:

        Offer Details
        Description: $description
        Date: $offerdate
        Remarks: $remarks

        Thank you for using SchoolHELP,

        The SchoolHELP Team
        ");

    $mailvolunteer->Body = $bodyvolunteer;

    $mailvolunteer->send();
    echo 'Message has been sent';

} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mailvolunteer->ErrorInfo;
}
//
//$mailadministrator = new PHPMailer(true);
//try {
//    $mailadministrator->isSMTP();
//    $mailadministrator->Host = 'smtp.gmail.com';
//    $mailadministrator->SMTPAuth = true;
//    $mailadministrator->Username = 'suryapradipta8@gmail.com';
//    $mailadministrator->Password = 'oqtpvfhwyadwcrpi';
//    $mailadministrator->SMTPSecure = 'ssl';
//    $mailadministrator->Port = 465;
//
//    // Sender
//    $mailadministrator->setFrom('suryapradipta8@gmail.com', 'The School HELP Team');
//
//    // Recipient
//    $mailadministrator->addAddress($adminemail, $adminfullname);
//
//
////Content
//    $mailadministrator->isHTML(true);
//    $mailadministrator->Subject = "Your ". $description . " Offer has been Accepted!";
//    $bodyadministrator =  nl2br(
//        "ADMIN
//        ");
//
//    $mailadministrator->Body = $bodyadministrator;
//
//    $mailadministrator->send();
//    echo 'Message has been sent';
//
//} catch (Exception $e) {
//    echo 'Message could not be sent. Mailer Error: ', $mailadministrator->ErrorInfo;
//}

header("location:../select-offer.php?offer-message=offer-success&id=$offerid");

?>