<?php
require 'header.php';
require 'class/DAO.php';
?>

<?php

    $p = new requete();


    $p->setConnection($servername,$dbname,$username,$password);

    $p->setSelectcommandeclient($_SESSION['user']['email']);

   $req = $p->getSelectall('all');
?>

<table class="table mt-4 table-danger container g-0 table-bordered text-center align-middle">
    
  <thead>
    <tr>
      <th scope="col">Plat</th>
      <th scope="col">Quantite</th>
      <th scope="col">Total</th>
      <th scope="col">Date de la commande</th>
      <th scope="col">Etat de la commande</th>
      <th scope="col">Nom du client</th>
      <th scope="col">Numeros de telephone</th>
      <th scope="col">Email</th>
      <th scope="col">adresse de livraison</th>
    </tr>
  </thead>
  <tbody>

<?php foreach($req as $commande): ?>

    <tr>
        <td><?= $commande['libelle']; ?></td>
        <td><?= $commande['quantite']; ?></td>
        <td><?= $commande['total']; ?></td>
        <td><?= $commande['date_commande']; ?></td>
        <td><?= $commande['etat']; ?></td>
        <td><?= $commande['nom_client']; ?></td>
        <td><?= $commande['telephone_client']; ?></td>
        <td><?= $commande['email_client']; ?></td>
        <td><?= $commande['adresse_client']; ?></td>
    </tr>

    <?php endforeach ?>
</tbody>
</table>

<?php
require 'footer.php';
?>