<? require '../page/_header.php';

if (isset($_POST['valider_client'])) {

    $sql = "INSERT INTO bo_client (NOMCLIENT, ADRESSE, TYPECLIENT,CODECLIENT,TEL,FAX,EMAIL,MOBILE,SOCIETE,EXEMPTTVA,
    BENEFICAIRE,AVECTVA,ETATCLIENT) VALUES (:libarticl, :id_categ, :type_article, :prixachat
    , :prixemballage,:IDFOURNISSEURS,:conds,:seuils )";

    $data = array(

        ":NOMCLIENT" => $_POST['NOMCLIENT'],

        ":ADRESSE" => $_POST['ADRESSE'],

        ":TYPECLIENT" => $_POST['TYPECLIENT'],

        ":CODECLIENT" => $_POST['CODECLIENT'],

        ":TEL" => $_POST['TEL'],

        ":FAX" => $_POST['FAX'],

        ":EMAIL" => $_POST['EMAIL'],

        ":MOBILE" => $_POST['MOBILE'],

    );

    $exe = $DB->query($sql, $data);

    header("location: client.php");

}