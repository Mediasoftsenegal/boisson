<? require '../page/_header.php';

if (isset($_POST['validersortie'])) {

// echo $_POST['date_invent'].'-'.$_POST['id_produit'].'-'.$_POST['quantinv'];

 $sql = "INSERT INTO bo_sortiestock (Date_sortie, IDARTICLE, quantite,motif) VALUES (:date_sortie, :id_article, :quantitesortie, :motif)";

 $data = array(

     ":date_sortie" => $_POST['date_sortie'],

     ":id_article" => $_POST['id_produit'],

     ":quantitesortie" => $_POST['quantitesortie'],

     ":motif" => $_POST['motif'],
 );

 $exe = $DB->query($sql, $data);

 header("location: sortie.php");

}
?>