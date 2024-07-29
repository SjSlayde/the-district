<?php 
 require('header.php');
 require_once 'class/DAO.php';
?>

<?php 
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
    
  }
  header('location:plat.php');

?>
 

<?php 

 require_once('footer.php');

?>