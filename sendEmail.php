<?php

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['name']) && isset($_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $subject = 'TEST';
    $messages = $_POST['messages'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    // SMTP SETTINGS
    $mail->isSMTP();                                            //Send using SMTP
    $mail->CharSet = "UTF-8";
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->Username   = 'phising2209@gmail.com';                     //SMTP username
    $mail->Password   = 'hacker22';                               //SMTP password
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

    //MAIL SETTINGS
    // $mail->isHTML(true);
    // $mail->setFrom($email, $name);
    // $mail->addAddress('yhwijaya2@gmail.com');
    // $mail->Subject = ("$email ($subject)");
    // $mail->Body = $messages;
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    $mail->From = 'phising2209@gmail.com';
    $mail->FromName = 'Yohan';
    $mail->AddAddress('nuno180202@gmail.com');
    $mail->AddReplyTo('nuno180202@gmail.com', 'Rifa');
    $mail->IsHTML(true);
    $mail->Subject    = $subject;
    $mail->Body    = $messages . $number;

    /* if($mail->send()){
        $status = "Success";
        $response = "Email sent!";
    }
    else{
        $status = "Failed";
        $response = "Gabhisa kirim : <br>" . $mail->ErrorInfo;
    } */

    if (!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
    exit(json_encode(array("status" => $status, "response" => $response)));
}
