<?php 
require_once('header.php')
?>
  
  <!--Debut du carousel-->
  <!--premiere page carousel javascript-->

  <?php
$stmt = $conn->prepare("SELECT * FROM categorie");

try {

    $stmt->execute();

} catch (PDOException $e) {

    echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
}

$result = $stmt->fetchAll();
            
            $i = 1;
                foreach($result as $category){
                  if($i==1){
                    echo '<div id="page1">
                    <div class="container"> 
                            <div class="fs-1 texte ms-md-4">Toute les catégories :</div><br>
                              <div class="row justify-content-between mt-3">';
                  }  elseif($i==7) {
                    echo '<div id="page2">
                    <div class="container"> 
                            <div class="fs-1 texte ms-md-4">Toute les catégories :</div><br>
                              <div class="row justify-content-between mt-3">';
                  };
                  echo '<div class="card col-12 col-sm-6 col-md-4 mt-3 mx-auto">
                                    <a class="link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="../category/'.$category['libelle'].'.html">
                                    <img src="../img/category/'.$category['image'].'" class="card-img-top imagecat" alt="'.$category['libelle'].'food">
                                    <div class="card-body">
                                      <h5 class="card-title h3">'.$category['libelle'].'</h5>
                                    </div>
                                  </a>
                                  </div>';
                                  if($i == 6 or $i ==8 ){
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
    <!--Script js et Bootstrap-->

    <script src="../js/test.js"></script>
    <script src="../js/carouselcategorie.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>