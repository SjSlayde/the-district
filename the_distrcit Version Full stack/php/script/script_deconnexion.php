<?php
require '../header.php';
require '../class/DAO.php';

unset($_SESSION['user']);
header('location:../index.php');

require '../footer.php';
?>