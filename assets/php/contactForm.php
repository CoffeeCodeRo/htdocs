<?php

use PHPMailer\PHPMailer\PHPMailer;
if(isset($_POST['name']) && isset($_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = "mail.turver.ro";
    $mail->SMTPAuth = true;
    $mail->Username = 'office@turver.ro';
    $mail->Password = 'TURVER1234567';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';

    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress('office@image.png.ro');
    $mail->Subject = $subject;
    $mail->Body = $message;

    if (!$mail->send()) {
        echo "Message has been sent";
        echo ("<script>
    window.alert('Mesajul tau nu s-a putut inregistra, incearca mai tarziu!');
    window.location.href='https://turver.ro/';
    </script>");
        exit;
    }

    echo ("<script>
    window.alert('Mesajul tau a fost trimis!');
    window.location.href='https://turver.ro/';
    </script>");
}


