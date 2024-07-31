<?php 

require_once('header.php');

?>

<?php if(isset($_POST['inscription_et_connexion']) and $_POST['inscription_et_connexion'] == 'inscription'){?>

    <!--Formulaire de Contact Start-->
    <form action="script/script_inscription.php" id="form" method='POST'>
        <div class="container mt-3">
            <div class="row mb-3 justify-content-center">
                <div class="col-7 mb-3">
                    <label for="nom" class="col-3 form-label">Nom et Prénom*:</label>
                    <input type="text" name="nominscription" class="form-control" id='nom' required>
                </div>
                <div class="col-7 mb-3">
                    <label for="email" class="col-3 form-label">Email*:</label>
                    <input type="email" name="emailinscription" class="form-control" id='email' required>
                </div>
                <div class="col-7 mb-3">
                    <label for="password" class="col-3 form-label">password*:</label>
                    <input type="text" name="passwordinscription" class="form-control" id='password' required>
                </div>
                <div class="col-7 mb-3">
                    <label for="passwordconf" class="col-3 form-label">password confimation*:</label>
                    <input type="text" name="passwordconfinscription" class="form-control" id="passwordconf" required>
                </div>
                <div class="row justify-content-evenly mt-3">
                    <button class="btn btn-succes color-315F72 rounded-pill col-1" type="reset" id="precedent">Annuler</button>
                    <button class="btn btn-succes color-315F72 rounded-pill col-1" type="submit"  id="suivant">Envoyer</button>
                </div>
            </div>
        </div>
    </form>

<?php } elseif(isset($_POST['inscription_et_connexion']) and $_POST['inscription_et_connexion'] == 'connexion'){?>

    <form action="script/script_connexion.php" id="form" method='POST'>
        <div class="container mt-3">        
            <div class="row mb-3 justify-content-center">
                <div class="col-7 mb-3">
                    <label for="email" class="col-3 form-label">Email*:</label>
                    <input type="email" name="emailconnexion" class="form-control" id="email" required>
                </div>
                <div class="col-7 mb-3">
                    <label for="password" class="col-3 form-label">password*:</label>
                    <input type="text" name="passwordconnexion" class="form-control" id="password" required>
                </div>
                <div class="row justify-content-evenly mt-3">
                    <button class="btn btn-succes color-315F72 rounded-pill col-1" type="reset" id="precedent">Annuler</button>
                    <button class="btn btn-succes color-315F72 rounded-pill col-1" type="submit"  id="suivant">Envoyer</button>
                </div>
            </div>
        </div>
    </form>

    <?php } ?>

    <!--Formualaire de Contact End-->

    <?php 
    
    require_once('footer.php') 
   
   ?>
