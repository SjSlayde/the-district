<?php 
//appelle des fichiers php header et dao
require_once('header.php');
require('class/DAO.php');
?>

<?php
//creation class requete
$p = new requete();
$p->setConnection($servername,$dbname,$username,$password);

//si la personne souhaiter une categorie en particulier (le get numcat contient l'id de la categorie souhaiter)
if(isset($_GET['numcat'])){
  
  //convertie le get numcat en int(juste pour etre sur que rien ne rentre autre que des chiffres)
  $stocknum = intval($_GET['numcat']); 
  //requete pour tout les plat de la categorie souhaiter
  $p->setSelectcondition('plat',$stocknum);

  //requete pour obtenir le nom de la categorie qui se trouve dans la variable get numcat
  $cat = new requete();
  $cat->setConnection($servername,$dbname,$username,$password);
  $cat->setSelectone('categorie',$stocknum);
  
  //one pour obtenir une seule reponse possible
  $resultcat = $cat->getSelectall('one');
  unset($cat);
  
} else {
  //si il n'y a rien dans la viarible get numcat affiche tout les plats dans la base de données
  $p->setSelectcondition('plat','toutlesplat');
}

//all pour plusieur reponse possible
$result = $p->getSelectall('all');
unset($p);
?>

<div id="Titre" class="container">
    <div class="fs-1 ms-md-4"><?php if(isset($resultcat)){echo 'Toutes Les '.$resultcat['libelle'].'s';} else {echo 'Tous Les Plats';}?> :</div>
</div>
<div id="checkplathtml" class="g-0 p-0 row justify-content-center">

<?php
$stock == 'null';
            $i = 1;
            $nbpage = 1;
            echo '<form action="commande.php" method="get">';
                foreach($result as $plat){

                  if (($i+3)%4 == 0) {
                    echo '<div id="page'.$nbpage.'" class="container">';
                    $nbpage++;
                  } 

                  if($i % 2 != 0) {echo '<div class="row justify-content-center">';}
                  echo '<div class="card col-4 flex-row mt-3 mx-md-5" style="width: 35rem">
                          <img src="../img/food/'.$plat['image'].'" class="rounded-3 img-fluid m-auto" alt="'.$plat['platnom'].'food" style="width: 10rem; height: fit-content;">
                        <div class="card-body">
                          <h5 class="card-title mt-md-4">'.$plat['platnom'].'</h5>
                          <p class="card-text">"'.$plat['description'].'"</p>
                          <p class="card-text">prix : '.$plat['prix'].'</p>
                          <div class="d-flex justify-content-end">
                            <button type="submit" class="d-none d-md-block btn btn-primary btn-lg position-absolute bottom-0 end-0" name="platcom" value="'.$plat['id'].'">Commander</button>
                            <button type="submit" class="d-block d-md-none btn btn-primary btn-lg position-absolute bottom-0 start-0" name="platcom" value="'.$plat['id'].'">Commander</button>
                            </div>
                        </div>
                        </div>';

                  if($i % 2 == 0){echo '</div>';}
                  
                  if ($i % 4 == 0 ) {
                        echo '</div>';}
                  $i++;
                };
                echo '</form>';
            ?>

            </div> 
            </div>
       
            <!--bouton Bouton Carousel-->
    <div id="boutonarmy" class="container <?php if($i<4) echo 'd-none';?>">
    <div id="yop" class="row justify-content-around mt-3">
        <button class=" btn rounded-pill col-md-2 col-4" type="button" id="precedent">precedent</button>
        <button class=" btn rounded-pill col-md-2 col-4" type="button"  id="suivant"> suivant</button>
    </div>
    </div>
    
    <!--carousel end-->
    <!--formulaire de commande start-->

    <!--formulaire commande end-->

    <!--Debut Footer/Navbar Social Media-->

    <?php require_once('footer.php') ?>

    <!--Fin Footer/Navbar Social Media-->
    <!--Script js et Bootstrap-->