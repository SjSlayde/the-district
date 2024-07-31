<?php 
require_once '../header.php';
require_once '../class/DAO.php';
require '../class/vendor/autoload.php';

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;

$validator = new EmailValidator();
//verifie si l'email est correcte 
if ($validator->isValid($_POST['emailconnexion'], new RFCValidation())) {

    $user = new verifyutilisateur();
    $user->setConnection($servername,$dbname,$username,$password);
    $user->setUser($_POST['emailconnexion']);
    if ($user->setPasswordverify($_POST['passwordconnexion'])){

        $user->setNom_prenom();
        $user->setEmail();
        $_SESSION['user']['nom_prenom'] = $user->getNom_prenom();
        $_SESSION['user']['email'] = $user->getEmail();
    };
    header("location:../index.php");
} else {
    echo "email incorrect";
}

require_once '../footer.php';
?>