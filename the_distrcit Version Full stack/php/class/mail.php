<?php
require_once('DAO.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

function envoiemail($texte,$emailclient,$nomclient){
    $mail = new PHPMailer(true);

// On va utiliser le SMTP
$mail->isSMTP();

// On configure l'adresse du serveur SMTP
$mail->Host       = 'localhost';    

// On désactive l'authentification SMTP
$mail->SMTPAuth   = false;    

// On configure le port SMTP (MailHog)
$mail->Port       = 1025;       

//en gros il s'en fout de tout ce qui est en haut
// $mail->SMTPOptions = array(
//     'ssl' => array(
//         'verify_peer' => false,
//         'verify_peer_name' => false,
//         'allow_self_signed' => true
//     )
// );

// Expéditeur du mail - adresse mail + nom (facultatif)
$mail->setFrom('from@thedistrict.com', 'The District Company');

// Destinataire(s) - adresse et nom (facultatif)
$mail->addAddress($emailclient, $nomclient);

//Adresse de reply (facultatif)
$mail->addReplyTo("reply@thedistrict.com", "Reply");

//CC & BCC
$mail->addCC("cc@example.com");
$mail->addBCC("bcc@example.com");

// On précise si l'on veut envoyer un email sous format HTML 
$mail->isHTML(true);

// // On ajoute la/les pièce(s) jointe(s)
// $mail->addAttachment('test.txt');

// Sujet du mail
$mail->Subject = 'info commande the district';

// Corps du message
$mail->Body = $texte;

// On envoie le mail dans un block try/catch pour capturer les éventuelles erreurs
if ($mail){
    try {
        $mail->send();
        } catch (Exception $e) {
        echo "L'envoi de mail a échoué. L'erreur suivante s'est produite : ", $mail->ErrorInfo;
        }
    }
}