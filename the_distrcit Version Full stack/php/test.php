<?php 
 require_once('header.php');
?>

<?php 
 require('class.DAO.php');
 $p = new requete();
 $p->setConnection($servername,$dbname,$username,$password);
 $p->setSelectall('plat');
$req = $p->getSelectall();
 
 
 
 
 
 
 
 
 
 foreach($req as $plat){
    echo '<div class="card col-4 flex-row mt-3 mx-md-5" style="width: 35rem;">
                          <img src="../img/food/'.$plat['image'].'" class="rounded-3 img-fluid m-auto" alt="'.$plat['platnom'].'food" style="width: 10rem; height: fit-content;">
                        <div class="card-body">
                          <h5 class="card-title mt-md-4">'.$plat['platnom'].'</h5>
                          <p class="card-text">"'.$plat['description'].'"</p>
                          <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-lg position-absolute bottom-0 end-0" name="platcom" value="'.$plat['id'].'">Commander</button>
                          </div>
                        </div>
                        </div>';
};
 ?>
 

<?php 
 require_once('footer.php');
?>