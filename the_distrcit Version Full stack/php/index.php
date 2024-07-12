
<?php 
require_once('header.php');
require('class/DAO.php');
 $p = new requete();
 $p->setConnection($servername,$dbname,$username,$password);
 $p->setSelectall('categorie');
$req = $p->getSelectall('all');
unset($p);
 ?>

<div>   
    <div class="gridmid">
    <div class="col-12 p-0 mid1 d-md-none d-lg-block parallax"></div>
        <div class="mid2 container my-5">
        <div class="row justify-content-center mt-3">
            <div class="fs-1 col-12 ms-md-5">Les Categories Favorites :</div>
            
            <?php
            $i = 0;
                foreach($req as $category){
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
unset($req);
$pd = new requete();
$pd->setConnection($servername,$dbname,$username,$password);
$pd->setSelectcondition('plat','plusvendue');
$req = $pd->getSelectall('all');
unset($pd);
                        $i = 0;
                        foreach($req as $plat){
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
                        unset($req);
                    ?>
                    </div>
                    </div>

                <div class="col-12 p-0 mid3 d-md-none d-lg-block d-sm-block parallax"></div>
                
                <?php 
                include_once ('footer.php')
                ?>

    </div>
