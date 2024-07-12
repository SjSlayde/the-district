<!DOCTYPE html>
<?php
session_start();

$servername = "localhost";
$username = "admin";
$password = "Afpa1234";
$dbname = "the_district";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // configurer le mode d'erreur PDO pour générer des exceptions
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données: " . $e->getMessage();
}
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
        elseif($_SERVER['REQUEST_URI'] == "/php/plat.php"){echo
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
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
        <ul class="navbar-nav ">
                <li class="nav-item px-5">
                    <a <?php if($_SERVER['REQUEST_URI'] == "/php/index.php")echo ' class="textnav nav-link active"';else echo ' class="textnav nav-link"'?> href="index.php" title="Accueil">Accueil</a>
                </li>
                <li class="nav-item px-5">
                    <a <?php if($_SERVER['REQUEST_URI'] == "/php/categorie.php")echo ' class="textnav nav-link active"';else echo ' class="textnav nav-link"'?> href="categorie.php" title="Categorie">Categorie</a>
                </li>
                <li class="nav-item px-5">
                    <a <?php if($_SERVER['REQUEST_URI'] == "/php/plat.php")echo ' class="textnav nav-link active"';else echo ' class="textnav nav-link"'?> href="plat.php" title="Plat">Plat</a>
                </li>
                <li class="nav-item px-5">
                    <a <?php if($_SERVER['REQUEST_URI'] == "/php/contact.php")echo ' class="textnav nav-link active"';else echo ' class="textnav nav-link"'?> href="contact.php" title="contact">contact</a>
                </li>
            </ul>
        </div>
     </nav>

<!--Navbar end-->
<!--Video top-->

<?php if($_SERVER['REQUEST_URI'] == "/php/index.php") echo
'<div id="parent">
            <div id="banniere" class="row g-0">
                <video id="video" class="col-12" src="../img/video/video_the_district.webm" style="width: 100vmax; height: 20vmax;" playsinline autoplay loop muted></video>
            </div>
            <div id="recherche" class="d-none d-sm-flex">
                <form class="col-12" role="search">
                    <input class="form-control me-2" type="search" placeholder="Recherche..." aria-label="Search">
                </form>
            </div>
        </div>';
        
        else echo
'<img id="img-top" src="../img/bg2.jpeg" alt="bg2">';
?>

<!--Banniere Top-->

</header>