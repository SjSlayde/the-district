<?php 
session_start();

echo 'la livraison de votre commande est estimer a  '.date('H:i:s', strtotime('+30 minutes', strtotime(date('H:i:s'))))." elle sera livrer au nom de ".$_REQUEST["nomprenom"]." a l'adresse ".$_REQUEST["adresse"];

$infoscommande = "\nnom et prenom :".$_REQUEST['nomprenom'].", email :".$_REQUEST['email'].", telephone :".$_REQUEST['tel'].", adresse du client :".$_REQUEST['adresse'].", date et heure de la commande :".date("d/m/Y H-m-s");

     // Ouverture en écriture seule 
     $fp = fopen("AAAA-MM-JJ-HH-MM-SS.txt", "a"); 
     
     // Ecriture du contenu ($myVar) 
     fputs($fp, $infoscommande); 
     
     // Fermeture du fichier  
     fclose($fp);
?>