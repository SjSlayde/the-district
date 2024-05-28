<?php
$infoscommande = "\nnom et prenom :".$_REQUEST['nom'].",".$_REQUEST['prenom'].", email :".$_REQUEST['email'].", telephone :".$_REQUEST['tel'].", adresse du client :".$_REQUEST['demande'].", date et heure de la commande :".date("d/m/Y H-m-s");

     // Ouverture en écriture seule 
     $fp = fopen("AAAA-MM-JJ-HH-MM-SS.txt", "a"); 
     
     // Ecriture du contenu
     fputs($fp, $infoscommande); 
     
     // Fermeture du fichier  
     fclose($fp);

     header("Location:index.php")
     ?>