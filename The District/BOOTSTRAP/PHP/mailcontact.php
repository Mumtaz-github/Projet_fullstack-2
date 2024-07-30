<?php
//echo "Mail.php file executed"; this one for test that phpmailer work or not
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomEmail = $_POST["Nom"];
    $prenomEmail = $_POST["Prenom"];
    $emailEmail = $_POST["email"];
    $phoneEmail = $_POST["PhoneNumber"];
    $DemandeEmail = $_POST["Demande"];

    $mail = new PHPMailer(true);

    // Configure PHPMailer to use Mailhog
    $mail->isSMTP();
    $mail->Host = 'localhost';
    $mail->Port = 1025;
    $mail->SMTPAuth = false;

    $mail->setFrom('from@thedistrict.com', 'The District Company');
    $mail->addAddress($emailEmail); // Use the email from the form

    $contenu = <<< CMD
    NomPrenom $nomEmail $prenomEmail
    Email: $emailEmail
    phone: $phoneEmail
    demande: $DemandeEmail
    CMD;

    $mail->Subject = 'Votre demande';
    $mail->Body = $contenu;

    try {
        $mail->send();
        echo 'Email envoyé avec succès';
    } catch (Exception $e) {
        echo "Sending email failed. The following error occurred : ", $mail->ErrorInfo;
    }
}
?>