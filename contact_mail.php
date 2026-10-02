<?php
use PHPMailer\PHPMailer\PHPMailer;
require_once __DIR__ . '/PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/src/SMTP.php';
require_once __DIR__ . '/PHPMailer/src/Exception.php';

/** L'objet optionnel permet un transport de test sans email réel. */
function sendContact(string $name, string $email, string $message, string $smtpUser, string $smtpPassword, ?PHPMailer $mail = null): PHPMailer {
    $mail ??= new PHPMailer(true);
    $mail->isSMTP(); $mail->Host = 'smtp.gmail.com'; $mail->SMTPAuth = true;
    $mail->Username = $smtpUser; $mail->Password = $smtpPassword;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; $mail->Port = 587;
    $mail->CharSet = 'UTF-8'; $mail->Timeout = 15;
    $mail->setFrom($smtpUser, 'Portfolio Zoyem Roslin Kenne');
    $mail->addReplyTo($email, $name);
    $mail->addAddress('zoyem.roslin.kenne@uqtr.ca');
    $mail->isHTML(false);
    $mail->Subject = "Nouveau message de $name";
    $mail->Body = "Nom: $name\nEmail: $email\nMessage: $message";
    if (!$mail->send()) throw new \PHPMailer\PHPMailer\Exception('Envoi impossible');
    return $mail;
}
