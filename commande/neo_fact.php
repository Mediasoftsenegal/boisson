<?php
session_start();
// facture
require '../page/_header.php';

function identid($idart){
    $pdo = new PDO('mysql:host=localhost;dbname=remacons_wp101;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');

    $articid =$pdo->query("SELECT * FROM bo_Articles where LIBARTICLE='$idart'"); 
       
    foreach ($articid as $rowid) {

    $libid = $rowid['IDARTICLE'];
   
    return $libid ;
   
    }
    }
function condit($idart){
        $pdo = new PDO('mysql:host=localhost;dbname=remacons_wp101;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
    
        $articon =$pdo->query("SELECT * FROM bo_Articles where LIBARTICLE='$idart'"); 
           
        foreach ($articon as $rowon) {
    
        $libcon = $rowon['CONDITIONNEMENT'];
        
        return $libcon ;
       
        }
}
// factures 

$Date_fact = date("Y-m-d");

$num_fact = $_POST['num_fac'];

$Montant_fact = $_POST['Montant_fact'];

$Id_comm_fact = $_POST['Id_commande'];


 $sqlfact = "INSERT INTO bo_factures (Date_factures, num_facture, Montant_factures, Id_commande) VALUES (:Date_factures, :num_facture, :Montant_factures, :Id_commande)";

$datafact = array(

    ":Date_factures" => $Date_fact,

    ":num_facture" => $num_fact,

    ":Montant_factures" => $Montant_fact,

    ":Id_commande" => $Id_comm_fact,

);

$DB->query($sqlfact, $datafact);

// ligne factures

    $Id_fact = $DB->lastInsertId();
      
// 
$commandes = $DB->query('SELECT * FROM bo_Commandes inner join bo_client 
    WHERE bo_Commandes.id_client =bo_client.IDCLIENTS
    AND Id_commande='.$Id_comm_fact);
    foreach ($commandes as $commande):

        $des= explode(",",$commande->des);
        $prix_uni= explode(",",$commande->pu);
        $qte= explode(",",$commande->qty);
     //   echo(count($des));
        for ($x=0; $x<count($des);$x++) {
            
            $sqllignfact = "INSERT INTO bo_ligne_factures (Id_facture,id_article,prix_unitaire,quantite,cond,nbre_bout)VALUES (:Id_facture,:id_article,:prix_unitaire,:quantite,:cond,:nbre_bout)";
           
            $vals=condit($des[$x]);
            
            $nbr=explode('X',condit($des[$x]));

            echo $Id_fact;

            echo $nbr[1].'-';

            echo identid($des[$x]).'-';

            echo  $prix_uni[$x].'-';

            echo $qte[$x].'-';

            echo $qte[$x]*$nbr[1].'<br>';

            $datalgfct = array(

                ":Id_facture" =>  $Id_fact,

                ":id_article" => identid($des[$x]) ,

                ":prix_unitaire" => $prix_uni[$x],

                ":quantite" => $qte[$x],

                ":cond" => condit($des[$x]),

                ":nbre_bout" => ($qte[$x]*$nbr[1]),

            );
             $DB->query($sqllignfact, $datalgfct); 
        }
      
    endforeach;
    

//$DB->query("DELETE FROM bo_panier WHERE id_user = ".$_SESSION['id']);

header("location: ../factures/lis_factures.php");