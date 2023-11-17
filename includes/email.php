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
    $mail->Host       = 'smtp.sendgrid.net';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'apikey';
    $mail->Password   = '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';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    /* Recipients */
    $mail->setFrom('mlumbibongani@gmail.com', 'Chef 60 Foods');
    $mail->addAddress('mlumbi@asestudent.co.za', 'Joe User');
    $mail->addReplyTo('chef60@gmail.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

   
    //$mail->addAttachment('http://example.com/attachments/file1.pdf');         

    /* Content */
    $mail->isHTML(true); 
    $mail->Subject = '';
    $mail->Body    = '';
    $mail->AltBody = '';

    $mail->send();
    echo "Message has been sent";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
