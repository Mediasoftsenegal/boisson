<? require '../page/_header.php';

if (isset($_POST['valider'])) {

    //echo $_POST['client'].'-'.$_POST['produit'].'-'.$_POST['tarif'];

    $sql = "INSERT INTO bo_tarif (id_client, id_article, montant) VALUES (:id_client, :id_article, :montant)";

    $data = array(

        ":id_client" => $_POST['client'],

        ":id_article" => $_POST['produit'],

        ":montant" => $_POST['tarif'],

    );

    $exe = $DB->query($sql, $data);

    header("location: tarif.php");

}