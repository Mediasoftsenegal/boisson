<?php require "../db.class.php";

$DB = new DB();

IF (isset($_POST['valider_tx'])){

$taxe = $_GET['type'];

$val = $_GET['valeur'];



$sql = "INSERT INTO bo_taxes (type_tax, valeur_tax) VALUES (:type, :val)";

$data = array(

    ":type" => $taxe,

    ":val" => $val

);

$DB->query($sql, $data);
header("location: taxe.php");
}
IF (isset($_POST['modifier_tx'])){

    $data =  array(
 
        $_POST['typetax'],
        
        $_POST['valeurtax'],
       
        $_POST['id_taxe']
        
    );
    echo $sql;

    $sql = "UPDATE bo_taxes SET type_tax=?,valeur_tax=? WHERE id_taxe=?";
   
     $exe = $DB->query($sql, $data);
     header("location: taxe.php");
}
