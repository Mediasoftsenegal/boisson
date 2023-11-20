<? require '../page/_header.php';
if (isset($_POST['modifier'])) {
    //echo $_POST['client'].'-'.$_POST['produit'].'-'.$_POST['tarif'];
    $sql = "UPDATE bo_tarif SET montant = ? WHERE id_client = ? AND id_article = ?";
    $data = array(
        $_POST['tarif'],
        $_POST['client'],
        $_POST['produit']
    );
    $exe = $DB->query($sql, $data);
    header("location: tarif.php");
}