
<?php 
require_once("header.php");
require('class/DAO.php');
require_once 'class/mail.php';
require 'class/vendor/autoload.php';

//pour installer email validator
//composer require egulias/email-validator 

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;

  $p = new requete();
  $p->setConnection($servername,$dbname,$username,$password);
  $id = intval($_POST['stock']);
  $p->setSelectone('plat',$id);
  $commande = $p->getSelectall('one');
 unset($p);
?>
<body>
    <style>
        #cat{
            width: 300px;
        }
    </style>
    <?php
    //creer un nouvelle class pour verifier si l'email est valide. un regexp performant pour les emails etant trop chiant a mettre en place    
    $validator = new EmailValidator();
    //verifie si l'email est correcte 
    if ($validator->isValid($_REQUEST['email'], new RFCValidation())) {
    // $date = date("Y-m-d H:m:s-0000");
    $dateliv = date('H:i:s', strtotime('+30 minutes', strtotime(date('H:i:s'))));
    
    // calcule de la somme a regler
    $total = $commande['prix'] * $_REQUEST['quantite'];
    
    echo '<div class="row justify-content-center">la livraison de votre commande est estimer a  '.$dateliv.' elle sera livrer au nom de '.$_REQUEST["nomprenom"].' a l\'adresse '.$_REQUEST["adresse"].'</div>
            <div class="container g-0">
                <div class="row justify-content-center">
                    <img id="cat" class="img-fluid" src="../img/cat_waiting.jpeg" alt="waiting">
                </div>
            </div>';
    
    //texte inserer dans le fichier texte pour le cahier des charge DIW
    $infoscommande = "\nnom et prenom :".$_REQUEST['nomprenom'].", email :".$_REQUEST['email'].", telephone :".$_REQUEST['tel'].", adresse du client :".$_REQUEST['adresse'].", date et heure de la commande :".date("d/m/Y H-m-s").
                            " plat commander : ".$commande['libelle']." nombre commander : ".$_REQUEST['quantite']." prix payer :".$total;
    
    //ajoute la commande avec les infos dans la table commande
    $ajout = new Ajoutcommande($commande['id'],$_REQUEST['quantite'],$total,'En préparation',$_REQUEST['nomprenom'],$_REQUEST['tel'],$_REQUEST['email'],$_REQUEST['adresse']);
    $ajout->setConnection($servername,$dbname,$username,$password);
    $ajout->setAjout();
    
    //appel de la fonction pour envoyer un mail
    envoiemail($_REQUEST['adresse'],$_REQUEST['email'],$_REQUEST['nomprenom'],$_REQUEST['quantite'],$total,$commande['libelle'],$dateliv);
    
    // Ouverture en écriture seule 
    $fp = fopen("fichier_texte/"."commande.txt", "a"); 
    
    // Ecriture du contenu
    fputs($fp, $infoscommande); 
    
    // Fermeture du fichier  
    fclose($fp);

    


?>



<?php
} else {
    echo "<div class=\"container g-0\">
            <div class=\"row justify-content-center\">L'adresse e-mail n'est pas valide.</div>
            <div class=\"row justify-content-center\">
            <img id=\"cat\" class=\"img-fluid\" src=\"../img/erreur/redcross.jpg\" alt=\"waiting\">
            </div>
        </div>";
    }
require_once("footer.php");

?>

</body>
</html>