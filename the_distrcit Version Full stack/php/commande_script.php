
<?php 
require_once("header.php")
?>
<body>
    <style>
        #cat{
            width: 300px;
        }
    </style>
    <?php 
      $stmt = $conn->prepare('SELECT * FROM plat WHERE id = :id;');
      $stmt->bindParam(':id', $_POST['stock']);
      try {

        $stmt->execute();

    } catch (PDOException $e) {

        echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
    }
      $commande = $stmt->fetch();

echo '<div class="row justify-content-center">la livraison de votre commande est estimer a  '.date('H:i:s', strtotime('+30 minutes', strtotime(date('H:i:s'))))." elle sera livrer au nom de ".$_REQUEST["nomprenom"]." a l'adresse ".$_REQUEST["adresse"]."</div>";

$infoscommande = "\nnom et prenom :".$_REQUEST['nomprenom'].", email :".$_REQUEST['email'].", telephone :".$_REQUEST['tel'].", adresse du client :".$_REQUEST['adresse'].", date et heure de la commande :".date("d/m/Y H-m-s").
                        " plat commander : ".$commande['libelle']." nombre commander : ".$_REQUEST['quantite']." prix payer :".$commande['prix'] * $_REQUEST['quantite'];

// Ouverture en écriture seule 
$fp = fopen("commande.txt", "a"); 

// Ecriture du contenu
fputs($fp, $infoscommande); 

// Fermeture du fichier  
fclose($fp);
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