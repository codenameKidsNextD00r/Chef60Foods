<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';

function createMailer() {
    $mail = new PHPMailer(TRUE);

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
    $mail->addReplyTo('chef60@gmail.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    /* Attachments */
    //$mail->addAttachment('http://example.com/attachments/file1.pdf');         

    /* Content */
    $mail->isHTML(true); 

    return $mail;
}
