<?php 
    require '../page/_header.php';
    $id_client = $_GET['idf'];

    if(isset($_GET['add'])){
        $product = $DB->query('SELECT IDARTICLE FROM bo_Articles WHERE IDARTICLE=:IDARTICLE', array('IDARTICLE' => $_GET['add']));
        $panier->add($product[0]->IDARTICLE);
        header("location: produit.php?id=$id_client");
    }
    
?>