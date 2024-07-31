<!-- <!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>The District</title>
    <link rel="shortcut icon" type="image/png" href="../img/the_district_brand/favicon.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../css/categorie.css" />
  </head>
  <body> -->
  
<?php 

require_once('header.php');

?>

    <!--Formulaire de Contact Start-->
    <form action="script/script_contact.php" id="form">
        <div class="container mt-3">
            <div class="row mb-3">
                <div class="col-6 mb-3">
                    <label for="Nom" class="col-3 form-label">Nom*:</label>
                    <input type="text" name="nom" class="form-control" id="Nom" >
                </div>
                <div class="col-6 mb-3">
                    <label for="Prenom" class="col-3 form-label">Prénom*:</label>
                    <input type="text" name="prenom" class="form-control" id="Prenom" >
                </div>
                <div class="col-6 mb-3">
                    <label for="Email" class="col-3 form-label">Email*:</label>
                    <input type="email" name="email" class="form-control" id="Email">
                </div>
                <div class="col-6 mb-3">
                    <label for="Tel" class="col-3 form-label">Téléphone*:</label>
                    <input type="text" name="tel" class="form-control" id="Tel">
                </div>
                <div class="col-12 mb-3">
                    <label for="Demande" class="col-3 form-label">Votre Demande*:</label>
                    <textarea cols="500" rows="4" name="demande" class="form-control" id="Demande"></textarea>
                </div>
                <div class="row justify-content-between mt-3">
                    <button class="btn btn-succes color-315F72 rounded-pill col-1" type="reset" id="precedent">Annuler</button>
                    <button class="btn btn-succes color-315F72 rounded-pill col-1" type="submit"  id="suivant">Envoyer</button>
                </div>
            </div>
        </div>
    </form>

    <!--Formualaire de Contact End-->

    <?php require_once('footer.php') ?>

    <!--Script Java et Bootstrap-->