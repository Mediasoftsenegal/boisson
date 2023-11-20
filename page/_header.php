<?php 
    require '../db.class.php';
    require '../appro/panier.class.php';
    $DB = new DB();
    $panier = new panier($DB);
?>