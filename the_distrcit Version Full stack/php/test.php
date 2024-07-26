<?php 
 require('header.php');
?>

<?php 
$str = 'michel';
 $result = nettoyerChaine($str);
function nettoyerChaine($string) {
  //filtre pour les caractere speciaux merci blackboxAI
  $filtrecaracteresSpeciaux = ["\x00","\n","\r","\\","'","\"","\x1a","\t","\f","\r\n","?","!",".",",",
                              ":",";","-","_","=","+","*","/","\\","^","$","#","%","&","|","~","`","´",
                              "^","¨","¸","˛","ˇ","˘","¯","¨","°","²","³","⁴","⁵","⁶","⁷","⁸","⁹","¹⁰",];
  
  //remplace tout les caractere speciaux par rien
  $string = str_replace($filtrecaracteresSpeciaux, '', $string);
  return $string;
  }
  echo $result;
 ?>
 

<?php 
 require_once('footer.php');
?>