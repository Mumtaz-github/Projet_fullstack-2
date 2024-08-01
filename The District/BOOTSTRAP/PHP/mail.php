


     <?php
        //echo "Mail.php file executed"; this one for test that phpmailer work or not
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        require_once 'vendor/autoload.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nomCommande = $_POST["NomPrenom"];
            $prenomCommande = $_POST["NomPrenom"];
            $emailCommande = $_POST["email"];
            $phoneCommande = $_POST["phone"];
            $adressCommande = $_POST["demande"];
            $libelle = $_POST["libelle"];
            $prixUnitaire = $_POST["prixUnitaire"];
            $quantite = $_POST["quantite"];
            $total = $_POST["prixUnitaire"] * $_POST["quantite"];

            $mail = new PHPMailer(true);

            // Configure PHPMailer
            $mail->isSMTP();
            $mail->Host = 'localhost';
            $mail->Port = 1025;
            $mail->SMTPAuth = false;

            $mail->setFrom('from@thedistrict.com', 'The District Company');
            $mail->addAddress($emailCommande);

            $contenu = <<< CMD
    NomPrenom $nomCommande $prenomCommande
    Email: $emailCommande
    phone: $phoneCommande
    demande: $adressCommande

    Votre commande:
    libelle : $libelle
    prix: $prixUnitaire
    quantite: $quantite
    total: $total
    CMD;

            $mail->Subject = 'Votre commande';
            $mail->Body = $contenu;

            try {
                $mail->send();
                echo 'Email envoyé avec succès';
            } catch (Exception $e) {
                echo "Sending email failed. The following error occurred : ", $mail->ErrorInfo;
            }
        }
        ?>