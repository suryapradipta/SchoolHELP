<?php

include 'connection.php';

$offerid = $_POST['offerid'];

$sql = mysqli_query($connect, "UPDATE offer SET offerstatus = 'ACCEPTED' WHERE offerid = '$offerid'");


$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'nandaimehokagenaruto@gmail.com';
    $mail->Password = 'Uzumakinaruto1234';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    //Recipients
    $mail->setFrom('suryapradipta8@gmail.com', 'MSU Medical Centre');
    $mail->addAddress($email, $fullname);     // Add a recipient

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Confirmation of Vaccination Appointment Information';
    $mail->Body    = "Hello, Mr./Mrs.".$fullname .",We have confirmed your Appointment Vaccination request.
        please arrive on the date you requested previously.Thank you.";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

header("location:../select-offer.php?offer-message=offer-success&id=$offerid");

?>