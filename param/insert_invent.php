<? require '../page/_header.php';

if (isset($_POST['valider'])) {

   // echo $_POST['date_invent'].'-'.$_POST['id_produit'].'-'.$_POST['quantinv'];

    $sql = "INSERT INTO bo_inventaire (Date_inventaire, IDARTICLE, quantité_decompte) VALUES (:date_invent, :id_article, :quantinv)";

    $data = array(

        ":date_invent" => $_POST['date_invent'],

        ":id_article" => $_POST['id_produit'],

        ":quantinv" => $_POST['quantinv'],

    );

    $exe = $DB->query($sql, $data);

    header("location: inventaire.php");

}

?>