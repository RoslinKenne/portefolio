<?php
require __DIR__ . '/../contact_mail.php';
class LocalMailer extends \PHPMailer\PHPMailer\PHPMailer {
    public bool $prepared = false;
    public function send(): bool { $this->prepared = $this->preSend(); return $this->prepared; }
}
$mail = sendContact('Élodie', 'elodie@example.test', "Bonjour\nVérification locale.", 'sender@example.test', 'fixture-local-only', new LocalMailer(true));
if (!$mail->prepared || $mail->From !== 'sender@example.test'
    || $mail->getReplyToAddresses()['elodie@example.test'][0] !== 'elodie@example.test'
    || $mail->Subject !== 'Nouveau message de Élodie'
    || !str_contains($mail->getSentMIMEMessage(), 'sender@example.test')
    || $mail->CharSet !== 'UTF-8') throw new RuntimeException('Message mal préparé');
echo "Préparation MIME, UTF-8, expéditeur et Reply-To : OK (aucun email envoyé)\n";
