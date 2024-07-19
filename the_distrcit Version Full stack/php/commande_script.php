
<?php 
require_once("header.php");
require('class/DAO.php');
require_once 'class/mail.php';

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
    $total = $commande['prix'] * $_REQUEST['quantite'];
    $date = date("Y-m-d H:m:s-0000");
    // 2021-07-20 07:11:06.000

echo '<div class="row justify-content-center">la livraison de votre commande est estimer a  '.date('H:i:s', strtotime('+30 minutes', strtotime(date('H:i:s'))))." elle sera livrer au nom de ".$_REQUEST["nomprenom"]." a l'adresse ".$_REQUEST["adresse"]."</div>";

$infoscommande = "\nnom et prenom :".$_REQUEST['nomprenom'].", email :".$_REQUEST['email'].", telephone :".$_REQUEST['tel'].", adresse du client :".$_REQUEST['adresse'].", date et heure de la commande :".date("d/m/Y H-m-s").
                        " plat commander : ".$commande['libelle']." nombre commander : ".$_REQUEST['quantite']." prix payer :".$commande['prix'] * $_REQUEST['quantite'];

$textmail = 'votre commande de '.$_REQUEST['quantite'].' '.$commande['libelle'].' au nom de '.$_REQUEST['nomprenom'].' est en preparation elle sera livrée a l\'adresse '.$_REQUEST['adresse'];
//appel de la fonction pour envoyer un mail
envoiemail($textmail,$_REQUEST['email'],$_REQUEST['nomprenom']);

// Ouverture en écriture seule 
$fp = fopen("fichier_texte/"."commande.txt", "a"); 

// Ecriture du contenu
fputs($fp, $infoscommande); 

// Fermeture du fichier  
fclose($fp);

$ajout = new Ajoutcommande($commande['id'],$_REQUEST['quantite'],$total,'En préparation',$_REQUEST['nomprenom'],$_REQUEST['tel'],$_REQUEST['email'],$_REQUEST['adresse']);
$ajout->setConnection($servername,$dbname,$username,$password);
$ajout->setAjout();


?>
<div class="container g-0">
    <div class="row justify-content-center">
<img id="cat" class="img-fluid" src="../img/cat_waiting.jpeg" alt="waiting">
</div>
</div>



<?php

require_once("footer.php")
?>
</body>
</html>