<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>The District</title>
    <link rel="shortcut icon" type="image/png" href="../img/the_district_brand/favicon.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../css/categorie.css" />
  </head>
  <body>
<?php 
require_once('header.php')
?>
  
  <!--Debut du carousel-->
  <!--premiere page carousel javascript-->
  
  <div id="page1">
        <div class="container">
          <div class="fs-1 texte ms-md-4">Toute les catégories :</div><br>
         
          <div class="row justify-content-between mt-3">
         
            <!--Categorie Asian-->
              
            <div class="card col-12 col-sm-6 col-md-4 mt-3 mx-auto">
                <a class="link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="category/asianfood.html">
                <img src="../img/category/asian_food_cat.jpg" class="card-img-top imagecat" alt="sushi">
                <div class="card-body">
                  <h5 class="card-title h3">Asian Food</h5>
                </div>
              </a>
              </div>
              
              <!--Categorie Hamburger-->

              <div class="card col-12 col-sm-6 col-md-4 mt-3 mx-auto">
                <a class="link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="category/hamburger.html">
                <img src="../img/category/burger_cat.jpg" class="card-img-top imagecat" alt="burger">
                <div class="card-body">
                  <h5 class="card-title h3">Hamburger</h5>
                </div>
              </a>
              </div>
             
             <!--Categorie Sandwich-->
             
              <div class="card col-12 col-sm-6 col-md-4 mt-3 mx-auto">
                <a class="link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="category/sandwich.html">
                <img src="../img/category/sandwich_cat.jpg" class="card-img-top imagecat" alt="sandwich_cat">
                <div class="card-body">
                  <h5 class="card-title h3">Sandwich</h5>
                </div>
              </a>
              </div>
            
            </div>
           
            <div class="row justify-content-between mt-3">
              
              <!--Categorie Pasta-->
            
              <div class="card col-12 col-sm-6 col-md-4 mt-3 mx-auto">
                <a class="link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="category/pasta.html">
                <img src="../img/category/pasta_cat.jpg" class="card-img-top imagecat" alt="pasta">
                <div class="card-body">
                  <h5 class="card-title h3">Pasta</h5>
                </div>
              </a>
              </div>
                
              <!--Categorie Pizza-->
              
              <div class="card col-12 col-sm-6 col-md-4 mt-3 mx-auto">
                  <a class="link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="category/pizza.html">
                  <img src="../img/category/pizza_cat.jpg" class="card-img-top imagecat" alt="sushi">
                  <div class="card-body">
                    <h5 class="card-title h3">Pizza</h5>
                  </div>
                </a>
                </div>
               
               <!--Categorie Salade-->
               
                <div class="card col-12 col-sm-6 col-md-4 mt-3 mx-auto">
                  <a class="link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="category/salade.html">
                  <img src="../img/category/salade_cat.jpg" class="card-img-top imagecat" alt="salade_cat">
                  <div class="card-body">
                    <h5 class="card-title h3">Salade</h5>
                  </div>
                </a>
                </div>
            
              </div>
        </div>
    </div>

    <!--Page 2 du Carousel-->

    <div id="page2">
        <div class="container">
          <div class="fs-1 texte ms-md-4">Toute les catégories :</div><br>
            <div class="row justify-content-around mt-3">
              
              <!--Categorie Veggie-->

              <div class="card col-12 col-sm-6 col-md-4 mt-3 mx-auto">
                <a class="link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="category/veggie.html">
                <img src="../img/category/veggie_cat.jpg" class="card-img-top imagecat" alt="Veggie">
                <div class="card-body">
                  <h5 class="card-title h3">Veggie</h5>
                </div>
              </a>
              </div>
             
             <!--Categorie Wrap-->
             
              <div class="card col-12 col-sm-6 col-md-4 mt-3 mx-auto">
                <a class="link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="category/wrap.html">
                <img src="../img/category/wrap_cat.jpg" class="card-img-top imagecat" alt="Wrap">
                <div class="card-body">
                  <h5 class="card-title h3">Wrap</h5>
                </div>
              </a>
              </div>
            
            </div>
        </div>
    </div>
   
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