
<?php 
require_once('header.php');

$stmt = $conn->prepare("SELECT * FROM categorie WHERE active = 'YES'");

try {

    $stmt->execute();

} catch (PDOException $e) {

    echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
}

$result = $stmt->fetchAll();
 ?>

<div>   
    <div class="gridmid">
    <div class="col-12 p-0 mid1 d-md-none d-lg-block parallax"></div>
        <div class="mid2 container my-5">
        <div class="row justify-content-center mt-3">
            <div class="fs-1 col-12 ms-md-5">Les Categories Favorites :</div>
            
            <?php
            $i = 0;
                foreach($result as $category){
                    echo '<div class="card col-12 col-sm-6 col-md-4 mt-3 mx-auto">
                    <a class="link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="plat.php?numcat='.$category['id'].'">
                        <img src="../img/category/'.$category['image'].'" class="card-img-top imagecat" alt="'.$category['libelle'].'">
                        <div class="card-body">
                            <h5 class="card-title">'.$category['libelle'].'</h5>
                        </div>
                    </a>
                </div>';
                $i++;
                if($i == 6){   
                    break;
                    };
                };
            ?>       
                    <div class="fs-1 ms-md-5">Nos plats star :</div>

                    <?php 

                        $stmt = $conn->prepare("SELECT p.id,p.id_categorie,c.id_plat,SUM(quantite) as quantite_vendue,SUM(quantite)*prix as rentabilite,p.libelle,p.description,p.prix,p.image FROM commande c LEFT JOIN plat p ON c.id_plat =p.id WHERE c.etat != 'Annulée'  GROUP BY c.id_plat ORDER BY rentabilite DESC;");

                        try {

                            $stmt->execute();

                        } catch (PDOException $e) {

                            echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
                        }

                        $result = $stmt->fetchAll();

                        $i = 0;
                        foreach($result as $plat){
                            echo '  <div class="card col-12 col-sm-6 col-md-4 mt-3 mx-auto">
                                        <a class="link-body-emphasis link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="commande.php?platcom='.$plat["id"].'">
                                            <img src="../img/food/'.$plat["image"].'" class="card-img-top imageplat" alt="'.$plat["libelle"].'">
                                            <div class="card-body">
                                                <h5 class="card-title">'.$plat["libelle"].'</h5>
                                            </div>
                                        </a>
                                    </div>';
                        $i++;
                        if($i == 3){  
                            break;
                            };
                        };
                    ?>
                    </div>
                    </div>

                <div class="col-12 p-0 mid3 d-md-none d-lg-block d-sm-block parallax"></div>
                
                <?php 
                include_once ('footer.php')
                ?>

    </div>
