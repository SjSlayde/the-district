<?php 
require_once '../header.php';
require_once '../class/DAO.php';
require '../class/vendor/autoload.php';

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;

$validator = new EmailValidator();
//verifie si l'email est correcte 
if ($validator->isValid($_POST['emailinscription'], new RFCValidation()) AND ($_POST['passwordinscription'] == $_POST['passwordconfinscription'])) {

    echo $_POST['emailinscription'];
    //ajoute de l'utilisateur avec les infos dans la table utilisateur(vous l'avez pas vue venir hein)
    $ajout = new Ajoututilisateur($_POST['nominscription'],$_POST['emailinscription'],$_POST['passwordinscription']);
    $ajout->setConnection($servername,$dbname,$username,$password);
    $ajout->setAjoutuser();
    
    header("location:../index.php");
} else {
    echo "email incorrect";
}

require_once '../footer.php';

?>