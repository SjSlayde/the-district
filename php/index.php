<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The District</title>
    <link rel="shortcut icon" type="image/png" href="img/the_district_brand/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" class="link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="css/index.css">
</head>

<body>

    <!-- NAVBAR START -->
    <?php $myfile = fopen("header.php", "r") or die("Unable to open file!");
echo fread($myfile,filesize("header.php"));
fclose($myfile);?>
    <!-- <header id="navbar">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <a class="navbar-brand" href="#"><img src="img/the_district_brand/logo_transparent.png" width="50" class="d-inline-block align-text-top" alt="navicon"></a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
        <ul class="navbar-nav ">
                <li class="nav-item px-5">
                    <a class="textnav nav-link active" href="index.html" title="Accueil">Accueil</a>
                </li>
                <li class="nav-item px-5">
                    <a class="textnav nav-link" href="categorie.html" title="Categorie">Categorie</a>
                </li>
                <li class="nav-item px-5">
                    <a class="textnav nav-link" href="plat.html" title="Plat">Plat</a>
                </li>
                <li class="nav-item px-5">
                    <a class="textnav nav-link" href="concat.html" title="contact">contact</a>
                </li>
            </ul>
        </div>
     </nav> -->
    
     <!-- NAVBAR END -->

     <!-- VIDEO START -->

        <!-- <div id="parent">
            <div id="banniere" class="row g-0">
                <video id="video" class="col-12" src="img/video/video_the_district.webm" style="width: 100vmax; height: 20vmax;" playsinline autoplay loop muted></video>
            </div>
            <div id="recherche" class="d-none d-sm-flex">
                <form class="col-12" role="search">
                    <input class="form-control me-2" type="search" placeholder="Recherche..." aria-label="Search">
                </form>
            </div>
        </div>
</header>  -->

    <!-- VIDEO END -->
   
    <!-- CARD START -->

<div>   
    <div class="gridmid">
    <div class="col-12 p-0 mid1 d-md-none d-lg-block parallax"></div>
        <div class="mid2 container my-5">
        <div class="row justify-content-center mt-3">
            <div class="fs-1 col-12 ms-md-5">Les Categories Favorites :</div>
            
            
                <div class="card col-12 col-sm-6 col-md-4 mt-3 mx-auto">
                    <a class="link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="category/asianfood.html">
                        <img src="img/category/asian_food_cat.jpg" class="card-img-top imagecat" alt="sushi">
                        <div class="card-body">
                            <h5 class="card-title">Asian Food</h5>
                        </div>
                    </a>
                </div>
                
                <div class="card col-12 col-sm-6 col-md-4 mt-3 mx-auto">
                    <a class="link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="category/hamburger.html">
                        <img src="img/category/burger_cat.jpg" class="card-img-top imagecat" alt="burger">
                        <div class="card-body">
                            <h5 class="card-title">hamburger</h5>
                        </div>
                    </a>
                </div>
                
                <div class="card col-12 col-sm-6 col-md-4 mt-3 mx-auto">
                    <a class="link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="category/pizza.html">
                        <img src="img/category/pizza_cat.jpg" class="card-img-top imagecat" alt="sushi">
                        <div class="card-body">
                            <h5 class="card-title">Pizza</h5>
                        </div>
                    </a>
                </div>
                
                <div class="card col-12 col-sm-6 col-md-4 mt-3 mx-auto">
                    <a class="link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="category/pasta.html">
                        <img src="img/category/pasta_cat.jpg" class="card-img-top imagecat" alt="pasta">
                        <div class="card-body">
                            <h5 class="card-title">Pasta</h5>
                        </div>
                    </a>
                </div>
                
                <div class="card col-12 col-sm-6 col-md-4 mt-3 mx-auto">
                    <a class="link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="category/veggie.html">
                        <img src="img/category/veggie_cat.jpg" class="card-img-top imagecat" alt="Veggie">
                        <div class="card-body">
                            <h5 class="card-title">Veggie</h5>
                        </div>
                    </a>
                  </div>

                  <div class="card col-12 col-sm-6 col-md-4 mt-3 mx-auto">
                      <a class="link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="category/wrap.html">
                          <img src="img/category/wrap_cat.jpg" class="card-img-top imagecat" alt="Wrap">
                          <div class="card-body">
                              <h5 class="card-title">Wrap</h5>
                            </div>
                        </a>
                    </div>
                    
                    
                    <div class="fs-1 ms-md-5">Nos plats star :</div>
                    <div class="card col-12 col-sm-6 col-md-4 mt-3 mx-auto">
                        <a class="link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="category/pasta.html">
                            <img src="img/food/lasagnes_viande.jpg" class="card-img-top imageplat" alt="Wrap">
                            <div class="card-body">
                                <h5 class="card-title">lasagne</h5>
                            </div>
                        </a>
                    </div>
                    
                    
                    <div class="card col-12 col-sm-6 col-md-4 mt-3 mx-auto">
                        <a class="link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="category/hamburger.html">
                            <img src="img/food/cheesburger.jpg" class="card-img-top imageplat" alt="Wrap">
                            <div class="card-body">
                                <h5 class="card-title">Cheesburger</h5>
                            </div>
                        </a>
                    </div>

                    
                    <div class="card col-12 col-sm-6 col-md-4 mt-3 mx-auto">
                        <a class="link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="category/pasta.html">
                            <img src="img/food/spaghetti-legumes.jpg" class="card-img-top imageplat" alt="Wrap">
                            <div class="card-body">
                                <h5 class="card-title">Spaghetti Legumes</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
                <div class="col-12 p-0 mid3 d-md-none d-lg-block d-sm-block parallax"></div>
                
                <!-- CARD END -->
                <?php $myfile = fopen("footer.php", "r") or die("Unable to open file!");
echo fread($myfile,filesize("footer.php"));
fclose($myfile);?>
                <!-- FOOTER START -->
                
                <!-- <footer class="mid4">
                    <nav id="navbot" class="navbar navbar-expand bg-dark navbar-dark mt-3 rounded-pill rounded-xs-none container-fluid">
                        <div class="collapse navbar-collapse justify-content-center row" id="collapsibleNavbar2">
                            <ul class="navbar-nav col-12 justify-content-center mx-xl-2">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#" title="Accueil"><img src="img/social_media/icons8-facebook-48.png" class="img-fluid align-text-top" alt="navinsta"></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" title="Categorie"><img src="img/social_media/icons8-instagram-48.png" class="img-fluid d-inline-block align-text-top" alt="navfb"></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" title="Plat"><img src="img/social_media/icons8-tiktok-48.png" class="img-fluid d-inline-block align-text-top" alt="navtt"></a>
                                </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" title="contact"><img src="img/social_media/icons8-twitter-48.png" class="img-fluid d-inline-block align-text-top" alt="navx"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" title="contact"><img src="img/social_media/icons8-youtube-48.png" class="img-fluid d-inline-block align-text-top" alt="navyt"></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </footer> -->
    </div>
        
        <!-- FOOTER END -->


        <!-- SCRIPTS -->

        <script src="js/test.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    </body>
    </html>