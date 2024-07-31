
<?php 
require_once("header.php");
require('class/DAO.php');
require_once 'class/mail.php';
require 'class/vendor/autoload.php';

//pour installer email validator
//composer require egulias/email-validator 

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;

  $p = new requete();
  $p->setConnection($servername,$dbname,$username,$password);
  $id = intval($_POST['stock']);
  $p->setSelectone('plat',$id);
  $commande = $p->getSelectall('one');
 unset($p);
?>
<body>
    <style>
        #cat{
            width: 300px;
        }
    </style>
    <?php


echo $_SESSION['texte'];

require_once("footer.php");

?>

</body>
</html>