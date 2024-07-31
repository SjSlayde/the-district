<?php 

require_once '../header.php' ;
require_once '../class/DAO.php' ;

//creation class requete
$p = new requete();
$p->setConnection($servername,$dbname,$username,$password);

  $p->setSelectcondition('plat','toutlesplat');
  
  $result = $p->getSelectall('all');
  
  unset($p);

  $platrecherche = [];

  foreach($result as $plat){
    if (str_contains(strtolower($plat['platnom']), $_GET['recherche'])) {
    
      array_push($platrecherche, $plat['id']);
  
    } 
  }
  if(count($platrecherche) != 0){

    $_SESSION['recherche'] = $platrecherche;
    $_SESSION['table'] = 'plat';
    
  } else {
    $p = new requete();
    $p->setConnection($servername,$dbname,$username,$password);

  $p->setSelectall('categorie');
  
  $result = $p->getSelectall('all');
  
  unset($p);

  foreach($result as $cat){
    if (str_contains(strtolower($cat['libelle']), $_GET['recherche'])) {
    
        $_SESSION['numcat'] = $cat['id'];
  
    } 

      $_SESSION['table'] = 'categorie';
  }
  }
  
  header('location:../plat.php');

  require_once '../footer.php';

?>

