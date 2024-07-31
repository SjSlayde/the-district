<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

function envoiemail($adresse,$emailclient,$nomclient,$quantité,$total,$produit,$dateliv){

//set date jour et heure
$datejour = date("d-m-Y");
$dateheure = date("H:m");

//texte a inserer dans le mail 
//le \n ne fonctionne pas mais les br fonctionne
$texte  =  "Objet : Confirmation de votre commande<br>
<br>
    Chère/Cher ".$nomclient.",<br>
    <br>
    Nous vous remercions pour votre récente commande sur The District. Nous sommes ravis de vous informer que votre commande a été bien reçue et est actuellement en cours de traitement.<br>
    Détails de la commande :<br>
    <br>
        Nom du client : ".$nomclient."<br>
        Adresse de livraison : ".$adresse."<br>
        Date de commande : le ".$datejour." a ".$dateheure."<br>
        Produits commandés : ".$quantité." ".$produit."<br>
    <br>
    Étapes suivantes :<br>
    <br>
        Préparation de votre commande : Nos équipes sont en train de préparer soigneusement vos articles pour garantir leur fraîcheur et leur qualité.<br>
        Expédition : Votre commande sera expédiée sous 15min .<br>
        Livraison : La livraison est estimée pour le ".$dateliv.".<br>
    <br>
    Paiement :<br>
    <br>
    Le montant total de votre commande est de ".$total." euros, qui a été débité de votre mode de paiement sélectionné.<br>
    <br>
    Si vous avez des questions ou besoin d'assistance supplémentaire, n'hésitez pas à nous contacter à reply@thedistrict.com . Notre équipe est à votre disposition pour vous aider.<br>
    <br>
    Nous vous remercions de votre confiance et espérons que vous apprécierez vos produits !<br>
    
    Cordialement<br>,
    <br>
    The District";



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

// On ajoute la/les pièce(s) jointe(s)
$mail->addAttachment('../../img/the_district_brand/linkedin_banner_image_1.png');

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