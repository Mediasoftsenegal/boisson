<?php 
    require '../page/_header.php';
    $id_client = $_GET['idf'];
    $id = $_GET["add"];
    //echo $id;

    if(isset($_GET['add'])){
            $sql = "INSERT INTO bo_panier(id_article, id_user) VALUES (:id_article, :id_user)";
            $data = array(':id_article' => $id, ':id_user' => $_SESSION["id"], );
            $exe = $DB->query($sql, $data);
        header("location: produit.php?id=$id_client");
    }
    
?>