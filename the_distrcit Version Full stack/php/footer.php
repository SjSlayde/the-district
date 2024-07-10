<footer class="mid4">
                    <nav id="navbot" class="navbar navbar-expand bg-dark navbar-dark mt-3 rounded-pill rounded-xs-none container-fluid">
                        <div class="collapse navbar-collapse justify-content-center row" id="collapsibleNavbar2">
                            <ul class="navbar-nav col-12 justify-content-center mx-xl-2">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#" title="Accueil"><img src="../img/social_media/icons8-facebook-48.png" class="img-fluid align-text-top" alt="navinsta"></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" title="Categorie"><img src="../img/social_media/icons8-instagram-48.png" class="img-fluid d-inline-block align-text-top" alt="navfb"></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" title="Plat"><img src="../img/social_media/icons8-tiktok-48.png" class="img-fluid d-inline-block align-text-top" alt="navtt"></a>
                                </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" title="contact"><img src="../img/social_media/icons8-twitter-48.png" class="img-fluid d-inline-block align-text-top" alt="navx"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" title="contact"><img src="../img/social_media/icons8-youtube-48.png" class="img-fluid d-inline-block align-text-top" alt="navyt"></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </footer>
        <?php
    if($_SERVER['REQUEST_URI'] == "/php/commande.php?platcom=".$_GET['platcom']."" || $_SERVER['REQUEST_URI'] == "/php/contact.php"){echo
        '<script src="../js/filtre.js"></script>">';}
        elseif($_SERVER['REQUEST_URI'] == "/php/plat.php"){echo
            '<script src="../js/carouselplat.js"></script>';}
            elseif ($_SERVER['REQUEST_URI'] == "/php/categorie.php") {echo 
                '<script src="../js/carouselcategorie.js"></script>';}
    ?>
        <!--Script js et Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>