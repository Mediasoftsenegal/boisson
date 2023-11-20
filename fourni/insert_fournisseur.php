<? require '../page/_header.php';

if (isset($_POST['valider_four'])) {

   // echo $_POST['date_invent'].'-'.$_POST['id_produit'].'-'.$_POST['quantinv'];

    $sql = "INSERT INTO bo_Fournisseur (NOMFOURNISSEUR, ADRESSEFOUR, NUMFOURNISSEUR,TYPE_FOURNISSEURS,TEL,FAX,EMAIL,MOBILE) 
    VALUES (:nomfour, :adressfour, :numfour, :type_four, :tel,:fax,:email,:mobile )";

    $data = array(

        ":nomfour" => $_POST['NOMFOURNISSEUR'],

        ":adressfour" => $_POST['ADRESSEFOUR'],

        ":numfour" => $_POST['NUMFOURNISSEUR'],

        ":type_four" => $_POST['TYPE_FOURNISSEURS'],

        ":tel" => $_POST['TEL'],

        ":fax" => $_POST['FAX'],

        ":email" => $_POST['EMAIL'],

        ":mobile" => $_POST['MOBILE'],

    );

    $exe = $DB->query($sql, $data);

    header("location: fournisseur.php");

}