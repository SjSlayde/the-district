<?php 
//appelle des fichiers php header et dao
require_once('header.php');
require('class/DAO.php');

//creation class requete
 $p = new requete();
 $p->setConnection($servername,$dbname,$username,$password);

//requete pour afficher toute les categories
 $p->setSelectall('categorie');
 $result = $p->getSelectall('all');
unset($p);
?>
  
  <!--Debut du carousel-->
  <!--premiere page carousel javascript-->

  <?php
            $page=1;
            $i = 1;
                foreach($result as $category){
                  if(($i+5)%6 == 0){
                    echo '<div id="page'.$page.'">
                    <div class="container"> 
                            <div class="fs-1 texte mt-2 ms-md-4">Toutes les catégories :</div><br>
                              <div class="row justify-content-between mt-3">';
                              $page++;
                  } 
                  
                  echo '<div class="card col-12 col-sm-6 col-md-4 mt-3 mx-auto">
                                    <a class="link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="plat.php?numcat='.$category['id'].'">
                                    <img src="../img/category/'.$category['image'].'" class="card-img-top imagecat" alt="'.$category['libelle'].'food">
                                    <div class="card-body">
                                      <h5 class="card-title h3">'.$category['libelle'].'</h5>
                                    </div>
                                  </a>
                                  </div>';
                                  if($i%6 == 0 or $i == count($result) ){
                                    echo ' </div>
                                        </div>
                                      </div>';}
                $i++;
                };
            ?>     
   
    <!--Bouton carousel-->

    <div id="boutonarmy" class="container">
    <div class="row justify-content-between mx-4 mt-5">
        <button class="btn btn-succes color-315F72 rounded-pill col-2" type="button" id="precedent">precedent</button>
        <button class="btn btn-succes color-315F72 rounded-pill col-2" type="button"  id="suivant"> suivant</button>
    </div>
    </div>

    <!--Fin Carousel-->
    <!--Debut Footer/Navbar Social Media-->

    <?php require_once('footer.php') ?>

    <!--Fin Footer/Navbar Social Media-->