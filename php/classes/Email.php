<?php
use PHPMailer\PHPMailer\PHPMailer;
class Email {
    function sendEmail($email,$subject){
        $mail = new PHPMailer();
        $body = 'Test Email Alert';
        $mail->Host = "10.144.27.11";
        $mail->isSMTP();
        $mail->SMTPSecure = "tls"; //TLS
        $mail->Port = 25; //587
        $mail->addAddress($email);
        $mail->setFrom('dap@stanbic.co.tz','Datacenter Portal');
        $mail->addReplyTo('dap@stanbic.co.tz');
        $mail->addCC('fredrick.amani@stanbic.co.tz');
        $mail->addBCC('herbert.nicholas@stanbic.co.tz');
        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->Body = $body;

        if ($mail->send()){
            return true;
        }
        else{
            return 'not sent';
        }
    }
}