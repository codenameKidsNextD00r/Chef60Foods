<?php
/* Import PHPMailer classes into the global namespace
These must be at the top of your script, not inside a function */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';

/* If you installed PHPMailer manually(without Composer) do this instead: */
/*
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
*/

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(TRUE);

try {
    /*Server settings */ 
    $mail->SMTPDebug = 2; 
    $mail->isSMTP(); 
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'mlumbibongani@gmail.com';
    $mail->Password   = 'slutgang666';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    /* Recipients */
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('mlumbi@asestudent.co.za', 'Joe User');
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    /* Attachments */
    //$mail->addAttachment('http://example.com/attachments/file1.pdf');         

    /* Content */
    $mail->isHTML(true); 
    $mail->Subject = 'Here is the subject';
    $mail->Body    = '<p>This is the html message body <b>in bold!</b></p>';
    $mail->AltBody = 'This is the body in plain text for non-html mail clients';

    $mail->send();
    echo "Message has been sent";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
