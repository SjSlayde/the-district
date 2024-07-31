<!DOCTYPE html>
<?php
session_start();

$servername = "localhost";
$username = "admin";
$password = "Afpa1234";
$dbname = "the_district";

?>

<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>The District</title>
    <link rel="shortcut icon" type="image/png" href="../img/the_district_brand/favicon.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
    
    <?php
    if($_SERVER['REQUEST_URI'] == "/php/index.php"){echo
        '<link rel="stylesheet" href="../css/index.css">';}
        elseif($_SERVER['REQUEST_URI'] == "/php/plat.php?numcat=".$_GET['numcat']."" || $_SERVER['REQUEST_URI'] == "/php/plat.php"){echo
            '<link rel="stylesheet" href="../css/plat.css">';}
            else {echo 
                '<link rel="stylesheet" href="../css/categorie.css">';}
    ?>
    
</head>

  <body>

<header id="navbar">
 
 <!--Navbar start-->
 
 <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <a class="navbar-brand" href="#"><img src="../img/the_district_brand/logo_transparent.png" width="50" class="d-inline-block align-text-top" alt="navicon"></a>
            
            <button class="navbar-toggler me-4" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
        <div class='jutify-content-center'>
        <ul class="navbar-nav ">
                <li class="nav-item px-5">
                    <a <?php if($_SERVER['REQUEST_URI'] == "/php/index.php")echo ' class="textnav nav-link active"';else echo ' class="textnav nav-link"'?> href="index.php" title="Accueil">Accueil</a>
                </li>
                <li class="nav-item px-5">
                    <a <?php if($_SERVER['REQUEST_URI'] == "/php/categorie.php")echo ' class="textnav nav-link active"';else echo ' class="textnav nav-link"'?> href="categorie.php" title="Categorie">Categorie</a>
                </li>
                <li class="nav-item px-5">
                    <a <?php if($_SERVER['REQUEST_URI'] == "/php/plat.php?numcat=".$_GET['numcat']."" || $_SERVER['REQUEST_URI'] == "/php/plat.php")echo ' class="textnav nav-link active"';else echo ' class="textnav nav-link"'?> href="plat.php" title="Plat">Plat</a>
                </li>
                <li class="nav-item px-5">
                    <a <?php if($_SERVER['REQUEST_URI'] == "/php/contact.php")echo ' class="textnav nav-link active"';else echo ' class="textnav nav-link"'?> href="contact.php" title="contact">contact</a>
                </li>
            </ul>
        </div>
        <?php if(isset($_SESSION['user'])){ ?>
        <div class='groupbutton d-block d-md-none justify-content-end me-3'>
                <button class="btn btn-primary col-7  ms-1" type="button" value='commande' name='commande_ou_deconnexion' onclick='window.location.href="detail_commande.php"'><?= $_SESSION['user']['nom_prenom'] ?></button>
                <button class="btn btn-primary col-7 mt-2 ms-1" type="button" value='inscription' name='commande_ou_deconnexion' onclick='window.location.href="script_deconnexion.php"'>deconnexion</button>
        </div>
             <?php } else { ?>
        <form action="script/form_inscriptioneconnexion.php" method='POST'>
            <div class='groupbutton d-block d-md-none row'>
                    <button class="btn btn-primary col-7 " type="submit" value='connexion' name='inscription_et_connexion'>connexion</button>
                    <button class="btn btn-primary col-7 mt-2" type="submit" value='inscription' name='inscription_et_connexion'>inscription</button>
            </div>
        </form>
        <?php } ?>
        </div>
        <?php if(isset($_SESSION['user'])){ ?>
        <div class='groupbutton d-none d-md-block justify-content-end me-3'>
                <button class="btn btn-primary me-2" type="button" value='commande' name='commande_ou_deconnexion' onclick='window.location.href="detail_commande.php"'><?= $_SESSION['user']['nom_prenom'] ?></button>
                <button class="btn btn-primary" type="button" value='inscription' name='commande_ou_deconnexion' onclick='window.location.href="script/script_deconnexion.php"'>deconnexion</button>
        </div>
             <?php } else { ?>
        <form action="form_inscriptioneconnexion.php" method='POST'>
        <div class='groupbutton d-none d-md-block justify-content-end me-3'>
                <button class="btn btn-primary me-2" type="submit" value='connexion' name='inscription_et_connexion'>connexion</button>
                <button class="btn btn-primary" type="submit" value='inscription' name='inscription_et_connexion'>inscription</button>
        </div>
        </form>
        <?php } ?>
     </nav>

<!--Navbar end-->
<!--Video top-->

<?php 
if($_SERVER['REQUEST_URI'] == "/php/index.php") 
echo '<div id="parent">
                <div id="banniere" class="row g-0">
                    <video id="video" class="col-12" src="../img/video/video_the_district.webm" style="width: 100vmax; height: 20vmax;" playsinline autoplay loop muted></video>
                </div>
                <div id="recherche" class="d-none d-sm-flex">
                    <form class="col-12" action="script/script_recherche.php" role="search">
                        <input class="form-control me-2" type="search" name="recherche" placeholder="Recherche..." aria-label="Search">
                    </form>
                </div>
            </div>';
            
            else echo
    '<img id="img-top" src="../img/bg2.jpeg" alt="bg2">';
?>

<!--Banniere Top-->


</header>