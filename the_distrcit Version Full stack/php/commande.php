<?php
require_once('header.php');
require('class/DAO.php');

  $p = new requete();
  $p->setConnection($servername,$dbname,$username,$password);
  $id = intval($_GET['platcom']);
  $p->setSelectone('plat',$id);
  $plat = $p->getSelectall('one');
 unset($p);
?>

    <div id="insertbgimg" class="mt-5">
            <form id="form" action="script_commande.php" method="POST" class="container mt-3">
                    <div class="row m-3">
                        
                        <div id="insertcommande" class="d-flex justify-content-center">

        <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
            <img src="../img/food/<?= $plat['image'] ?>" class="img-fluid rounded-start" alt="<?= $plat['name'] ?>">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= $plat['name'] ?></h5>
                <p class="card-text"><?= $plat['description'] ?></p>
                <p class="card-text"><small class="text-body-secondary"><?= $plat['prix'] ?></small></p>
            </div>
            </div>
        </div>
        </div>
                    </div>
                        
                        <div class="col-6 col-md-1" id="ChoixQuantité"><label for="quantite" class="labelt form-label">Quantité</label>
                            <select class="form-select" id="quantite" name='quantite' aria-label="Default select example">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                          </select></div>
                        
                          <input type="hidden" name="stock" value="<?= $plat['id'] ?>" >
                          <div class=" mt-3 col-12 mb-3">
                            <label for="Nom" class="labelt col-3 form-label">Nom et Prénom*:</label>
                            <input type="text" name="nomprenom" class="form-control" id="Nom" >
                        </div>
                        
                        <div class="col-md-6 col-12 mb-3">
                            <label for="Email" class="labelt col-3 form-label">Email*:</label>
                            <input type="text" name="email" class="form-control" id="Email">
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
<?php

require_once('footer.php');

?>