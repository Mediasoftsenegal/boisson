<?php require '../db.class.php';

$DB = new DB();
if ($_POST['acompte'] <= $_POST['reste']){
    $montpaye = $_POST['montantpaye'] + $_POST['acompte'];
    $ett = "NON PAYEE";
    $DateP = date('Y/m/d');
    $DB->query(
        "UPDATE bo_factures SET Montant_paye = :montpaye, Etat_factures = :ett , Date_paiement = :DateP WHERE Id_facture = :id",
        
        array(
    
            ":montpaye" => $montpaye,

            ":ett" =>  $ett,

            ":DateP" => date('Y/m/d'),
    
            ":id" => $_POST['id']
    
        )
    );
   header('location: acompte.php');
}
ELSE
{
	echo "<h1>Le montant de l\'acompte est supérieur au montant restant!</h1>";
	
	header('Refresh: 3; url = paie.php?id='.$_POST['id']);
}