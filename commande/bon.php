<?php //var_dump($_GET);
require '../page/_header.php';
/* echo count($_GET['des']);
echo $_GET['des'][0]; */
$count = count($_GET['des']);
for ($i=0; $i < $count; $i++) { 
    $sql = "INSERT INTO bo_Bon (des, pu, qty, total, id_client, id_user) VALUES (:des, :pu, :qty, :total, :cli, :user)";
    $data = array(
        ":des" => $_GET['des'][$i],
        ":pu" => $_GET['price'][$i],
        ":qty" => $_GET['qty'][$i],
        ":total" => $_GET['subtot'][$i],
        ":cli" => $_GET['id_client'],
        ":user" => $_GET['id_user']
    );
    $DB->query($sql, $data);
    $DB->query("DELETE FROM bo_panier WHERE id_user = ".$_GET['id_user']);
    header("location: commande.php");
}