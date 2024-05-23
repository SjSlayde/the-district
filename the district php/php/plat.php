<!-- <!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>The District</title>
    <link rel="shortcut icon" type="image/png" href="../img/the_district_brand/favicon.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../css/plat.css" />
  </head>
  <body> -->

<?php 
require_once('header.php')
?>
  
        <!--contenue carousel start-->
        <div id="Titre" class="container">
            <div class="fs-1 ms-md-4">Tout Les Plats :</div>
        </div>
        <!-- page Vegan-->

        <div id="pageveggie" class="container">
            <div class="row justify-content-center">
               
         <div class="card col-4 flex-row mt-3 mx-md-5" style="width: 35rem;">

          <img src="../img/food/cesar_salad.jpg" class="rounded-3 img-fluid m-auto" alt=""
          style="width: 10rem; height: fit-content;">

          <div class="card-body">

            <h5 class="card-title mt-md-4">la salade du chef</h5>
            <p class="card-text">"c'est la salade du chef quoi"</p>
            <div class="d-flex justify-content-end">
              <a href="#" class="btn btn-primary mt-md-5 btn-lg justify-content-center" onclick="commande(0)">Commander</a><span class="insertquantité"></span>
            </div>
          </div>
        </div> 

        <div class="card col-4 flex-row mt-3 mx-md-5" style="width: 35rem;">

            <img src="../img/food/salad1.png" class="rounded-3 img-fluid m-auto" alt=""
            style="width: 10rem; height: fit-content;">
  
            <div class="card-body">
  
              <h5 class="card-title mt-md-4">la salade du chef v2</h5>
              <p class="card-text">"c'est la salade du chef v2 quoi"</p>
              <div class="d-flex justify-content-end">
                <a href="#" class="btn btn-primary mt-md-5 btn-lg justify-content-center" onclick="commande(1)">Commander</a><span class="insertquantité"></span>
              </div>
            </div>
          </div> 
            </div>
         
            <div class="row justify-content-center">

                <div class="card col-4 flex-row mt-3 mx-md-5" style="width: 35rem;">

                    <img src="../img/food/Food-Name-8298.jpg" class="rounded-3 img-fluid m-auto" alt=""
                    style="width: 10rem; height: fit-content;">
          
                    <div class="card-body">
          
                      <h5 class="card-title mt-md-4">pizza epinard</h5>
                      <p class="card-text">"une abomination"</p>
                      <div class="d-flex justify-content-end">
                        <a href="#" class="btn btn-primary mt-md-5 btn-lg justify-content-center" onclick="commande(2)">Commander</a><span class="insertquantité"></span>
                      </div>
                    </div>
                  </div> 
                  
                  <div class="card col-4 flex-row mt-3 mx-md-5" style="width: 35rem;">

                            <img src="../img/food/spaghetti-legumes.jpg" class="rounded-3 img-fluid m-auto" alt=""
                            style="width: 10rem; height: fit-content;">
                            
                            <div class="card-body">
                                
                                <h5 class="card-title mt-md-4">pate veggie</h5>
                                <p class="card-text">"des pâte bolognaise sans viande"</p>
                                <div class="d-flex justify-content-end">
                                    <a href="#" class="btn btn-primary mt-md-5 btn-lg justify-content-center" onclick="commande(3)">Commander</a><span class="insertquantité"></span>
                                </div>
                            </div>
                        </div> 
                    
                    </div>
                </div>
        
        
        <!--Page Hamburger-->

        <div id="pagehamburger" class="container">
            
            <div class="row justify-content-center">
                <div class="card col-4 flex-row mt-3 mx-md-5" style="width: 35rem;">

                    <img src="../img/food/cheesburger.jpg" class="rounded-3 img-fluid m-auto" alt=""
                    style="width: 10rem; height: fit-content;">
                    
                    <div class="card-body">
                        
                        <h5 class="card-title mt-md-4">le vraie burger</h5>
                        <p class="card-text">"un cheesburger fait avec amour"</p>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-primary mt-md-5 btn-lg justify-content-center" onclick="commande(4)">Commander</a><span class="insertquantité"></span>
                        </div>
                    </div>
                </div> 
                <div class="card col-4 flex-row mt-3 mx-md-5" style="width: 35rem;">

                    <img src="../img/food/Food-Name-433.jpeg" class="rounded-3 img-fluid m-auto" alt=""
                    style="width: 10rem; height: fit-content;">
                    
                    <div class="card-body">
                        
                        <h5 class="card-title mt-md-4">le faux burger</h5>
                        <p class="card-text">"un cheesburger fait avec un peu moins d'amour"</p>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-primary mt-md-5 btn-lg justify-content-center" onclick="commande(5)">Commander</a><span class="insertquantité"></span>
                        </div>
                    </div>
                </div>
            
            </div>
            <div id="checkplathtml" class="row justify-content-center">
                <!--sert a verifie si le js doit faire disparaitre les autre cellule-->
                <div class="card col-4 flex-row mt-3 mx-md-5" style="width: 35rem;">

                    <img src="../img/food/hamburger.jpg" class="rounded-3 img-fluid m-auto" alt=""
                    style="width: 10rem; height: fit-content;">
          
                    <div class="card-body">
          
                      <h5 class="card-title mt-md-4">le burger roquette</h5>
                      <p class="card-text">"cde quoi decoller sur la lune"</p>
                      <div class="d-flex justify-content-end">
                        <a href="#" class="btn btn-primary mt-md-5 btn-lg justify-content-center" onclick="commande(6)">Commander</a><span class="insertquantité"></span>
                      </div>
                    </div>
                  </div>
              
                  <div class="card col-4 flex-row mt-3 mx-md-5" style="width: 35rem;">

                    <img src="../img/food/Food-Name-6340.jpg" class="rounded-3 img-fluid m-auto" alt=""
                    style="width: 10rem; height: fit-content;">
          
                    <div class="card-body">
          
                      <h5 class="card-title mt-md-4">hamburger avec un bison entier</h5>
                      <p class="card-text">"un burger de canibale"</p>
                      <div class="d-flex justify-content-end">
                        <a href="#" class="btn btn-primary mt-md-5 btn-lg justify-content-center" onclick="commande(7)">Commander</a><span class="insertquantité"></span>
                      </div>
                    </div>
                  </div>
            
            </div>
        </div>

        <!--Page Pizza-->
        
        <div id="pagepizza" class="container">
            <div class="row justify-content-center">
          
                <div class="card col-4 flex-row mt-3 mx-md-5" style="width: 35rem;">

                    <img src="../img/food/pizza-margherita.jpg" class="rounded-3 img-fluid m-auto" alt=""
                    style="width: 10rem; height: fit-content;">
          
                    <div class="card-body">
          
                      <h5 class="card-title mt-md-4">pizza margherita</h5>
                      <p class="card-text">"la pizza classique absolue"</p>
                      <div class="d-flex justify-content-end">
                        <a href="#" class="btn btn-primary mt-md-5 btn-lg justify-content-center" onclick="commande(8)">Commander</a><span class="insertquantité"></span>
                      </div>
                    </div>
                  </div>
          
                  <div class="card col-4 flex-row mt-3 mx-md-5" style="width: 35rem;">

                    <img src="../img/food/pizza-salmon.png" class="rounded-3 img-fluid m-auto" alt=""
                    style="width: 10rem; height: fit-content;">
          
                    <div class="card-body">
          
                      <h5 class="card-title mt-md-4">pizza saumon</h5>
                      <p class="card-text">"pizza qui sera vous etonnées"</p>
                      <div class="d-flex justify-content-end">
                        <a href="#" class="btn btn-primary mt-md-5 btn-lg justify-content-center" onclick="commande(9)">Commander</a><span class="insertquantité"></span>
                      </div>
                    </div>
                  </div>
            
            </div>
            <div class="row justify-content-start">
            
                <div class="card col-4 flex-row mt-3 mx-md-5" style="width: 35rem;">

                    <img src="../img/food/Food-Name-8298.jpg" class="rounded-3 img-fluid m-auto" alt=""
                    style="width: 10rem; height: fit-content;">
          
                    <div class="card-body">
          
                      <h5 class="card-title mt-md-4">pizza epinard</h5>
                      <p class="card-text">"une abomination"</p>
                      <div class="d-flex justify-content-end">
                        <a href="#" class="btn btn-primary mt-md-5 btn-lg justify-content-center" onclick="commande(10)">Commander</a><span class="insertquantité"></span>
                      </div>
                    </div>
                  </div>
            
            </div>
        </div>
        
        <!--Page Wrap-->

        <div id="pagewrap" class="container">
            <div class="row justify-content-center">
           
                <div class="card col-4 flex-row mt-3 mx-md-5" style="width: 35rem;">

                    <img src="../img/food/Food-Name-3461.jpg" class="rounded-3 img-fluid m-auto" alt=""
                    style="width: 10rem; height: fit-content;">
          
                    <div class="card-body">
          
                      <h5 class="card-title mt-md-4">wrap poulet brochée</h5>
                      <p class="card-text">"un petit en-cas parfait"</p>
                      <div class="d-flex justify-content-end">
                        <a href="#" class="btn btn-primary mt-md-5 btn-lg justify-content-center" onclick="commande(11)">Commander</a><span class="insertquantité"></span>
                      </div>
                    </div>
                  </div>

                  <div class="card col-4 flex-row mt-3 mx-md-5" style="width: 35rem;">

                    <img src="../img/food/buffalo-chicken.webp" class="rounded-3 img-fluid m-auto" alt=""
                    style="width: 10rem; height: fit-content;">
          
                    <div class="card-body">
          
                      <h5 class="card-title mt-md-4">wrap poulet effilochée</h5>
                      <p class="card-text">"un petit en-cas vraiment parfait"</p>
                      <div class="d-flex justify-content-end">
                        <a href="#" class="btn btn-primary mt-md-5 btn-lg justify-content-center" onclick="commande(12)">Commander</a><span class="insertquantité"></span>
                      </div>
                    </div>
                  </div>
            
            </div>
            <div class="row justify-content-start">
            
                <div class="card col-4 flex-row mt-3 mx-md-5" style="width: 35rem;">

                    <img src="../img/food/Food-Name-3631.jpg" class="rounded-3 img-fluid m-auto" alt=""
                    style="width: 10rem; height: fit-content;">
          
                    <div class="card-body">
          
                      <h5 class="card-title mt-md-4">pain au fromage</h5>
                      <p class="card-text">"un petit en-cas un peu moins parfait"</p>
                      <div class="d-flex justify-content-end">
                        <a href="#" class="btn btn-primary mt-md-5 btn-lg justify-content-center" onclick="commande(13)">Commander</a><span class="insertquantité"></span>
                      </div>
                    </div>
                  </div>
            
            </div>
        </div>
        
        <!--Page Pate-->

        <div id="pagepate" class="container">
                <div class="row justify-content-center">
              
                    <div class="card col-4 flex-row mt-3 mx-md-5" style="width: 35rem;">

                        <img src="../img/food/tagliatelles-saumon.webp" class="rounded-3 img-fluid m-auto" alt=""
                        style="width: 10rem; height: fit-content;">
              
                        <div class="card-body">
              
                          <h5 class="card-title mt-md-4">pate a la créme et saumon</h5>
                          <p class="card-text">"franchement le saumon est le pire poisson"</p>
                          <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-primary mt-md-5 btn-lg justify-content-center" onclick="commande(14)">Commander</a><span class="insertquantité"></span>
                          </div>
                        </div>
                      </div>
              
                      <div class="card col-4 flex-row mt-3 mx-md-5" style="width: 35rem;">

                        <img src="../img/food/spaghetti-legumes.jpg" class="rounded-3 img-fluid m-auto" alt=""
                        style="width: 10rem; height: fit-content;">
              
                        <div class="card-body">
              
                          <h5 class="card-title mt-md-4">pate veggie</h5>
                          <p class="card-text">"des pâte bolognaise sans viande"</p>
                          <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-primary mt-md-5 btn-lg justify-content-center" onclick="commande(15)">Commander</a><span class="insertquantité"></span>
                          </div>
                        </div>
                      </div>
                
                </div>
                <div class="row justify-content-start">
                
                    <div class="card col-4 flex-row mt-3 mx-md-5" style="width: 35rem;">

                        <img src="../img/food/lasagnes_viande.jpg" class="rounded-3 img-fluid m-auto" alt=""
                        style="width: 10rem; height: fit-content;">
              
                        <div class="card-body">
              
                          <h5 class="card-title mt-md-4">lasagne</h5>
                          <p class="card-text">"le plat des dieux"</p>
                          <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-primary mt-md-5 btn-lg justify-content-center" onclick="commande(16)">Commander</a><span class="insertquantité"></span>
                          </div>
                        </div>
                      </div>

                
                </div>
            </div>

            <!--Page Asian Food-->
            
            <div id="pageasian" class="container">
                <div class="row justify-content-start">
                    <div class="row justify-content-start">
                
                        <div class="card col-4 flex-row mt-3 mx-md-5" style="width: 35rem;">
    
                            <img src="../img/category/asian_food_cat.jpg" class="rounded-3 img-fluid m-auto" alt=""
                            style="width: 10rem; height: fit-content;">
                  
                            <div class="card-body">
                  
                              <h5 class="card-title mt-md-4">sushie</h5>
                              <p class="card-text">"Fait avec le poisson du jour il parait"</p>
                              <div class="d-flex justify-content-end">
                                <a href="#" class="btn btn-primary mt-md-5 btn-lg justify-content-center" onclick="commande(17)">Commander</a><span class="insertquantité"></span>
                              </div>
                            </div>
                          </div>
    
                    
                    </div>
                
                </div>
            </div>
        
            <!--bouton Bouton Carousel-->
    <div id="boutonarmy" class="container">
    <div id="yop" class="row justify-content-around mt-3">
        <button class=" btn rounded-pill col-md-2 col-4" type="button" id="precedent">precedent</button>
        <button class=" btn rounded-pill col-md-2 col-4" type="button"  id="suivant"> suivant</button>
    </div>
    </div>
    
    <!--carousel end-->
    <!--formulaire de commande start-->

    <div id="insertbgimg" class="mt-5">
            <form id="form" action="commande_script.php" method="POST" class="container mt-3">
                    <div class="row m-3">
                        
                        <div id="insertcommande" class="d-flex justify-content-center">
                        </div>
                        
                        <div class="col-1" id="ChoixQuantité"><label for="quantite" class="labelt form-label">Quantité</label>
                            <select class="form-select" id="quantite" aria-label="Default select example">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                          </select></div>
                        
                          <div class=" mt-3 col-12 mb-3">
                            <label for="Nom" class="labelt col-3 form-label">Nom et Prénom*:</label>
                            <input type="text" name="nomprenom" class="form-control" id="Nom" >
                        </div>
                        
                        <div class="col-md-6 col-12 mb-3">
                            <label for="Email" class="labelt col-3 form-label">Email*:</label>
                            <input type="text" name="Email" class="form-control" id="Email">
                        </div>
                        
                        <div class="col-md-6 col-12 mb-3">
                            <label for="Tel" class="labelt col-3 form-label">Téléphone*:</label>
                            <input type="text" name="tel" class="form-control" id="Tel">
                        </div>
                        
                        <div class="col-12 mb-3">
                            <label for="Adresse" class="labelt col-3 form-label">Votre adresse*:</label>
                            <textarea cols="500" rows="4" name="adresse" class="form-control" id="Adresse"></textarea>
                        </div>
                        
                        <div class="row justify-content-between mt-3">
                            <button class="btn btn-succes color-315F72 rounded-pill col-md-2 col-4" type="reset" id="Cancel">Annuler</button>
                            <button class="btn btn-succes color-315F72 rounded-pill col-md-2 col-4" type="submit" id="Envoyer">Envoyer</button>
                        </div>
                    </div>
            </form>
        </div>

    <!--formulaire commande end-->

    <!--Debut Footer/Navbar Social Media-->

    <?php require_once('footer.php') ?>

    <!--Fin Footer/Navbar Social Media-->
    <!--Script js et Bootstrap-->

    <script src="../js/test.js"></script>
    <script src="../js/carouselplat.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>