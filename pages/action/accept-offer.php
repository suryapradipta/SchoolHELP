<?php

include 'connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../assets/phpmailer/src/Exception.php';
require '../../assets/phpmailer/src/PHPMailer.php';
require '../../assets/phpmailer/src/SMTP.php';

$fullname = $_POST['fullname'];
$email = $_POST['email'];

$offerid = $_POST['offerid'];

$sql = mysqli_query($connect, "UPDATE offer SET offerstatus = 'ACCEPTED' WHERE offerid = '$offerid'");

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'suryapradipta8@gmail.com';
    $mail->Password = 'oqtpvfhwyadwcrpi';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

//Recipients
    $mail->setFrom('suryapradipta8@gmail.com', 'School Administrator');
    $mail->addAddress($email, $fullname);     // Add a recipient

//Content
    $mail->isHTML(true);
    $mail->Subject = 'Confirmation of Vaccination Appointment Information';
    $mail->Body    = "Hello, Mr./Mrs.".$fullname .",We have confirmed your Appointment Vaccination request.
        please arrive on the date you requested previously.Thank you.";

    $mail->send();
    echo 'Message has been sent';

//    echo "
//    <script>
//    alert('Sent successfully');
//    document.location.href = '../select-offer.php';
//    </script>
//    ";
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

header("location:../select-offer.php?offer-message=offer-success&id=$offerid");

?>