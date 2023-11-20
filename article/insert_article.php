<? require '../page/_header.php';

if (isset($_POST['valider_article'])) {

   // echo $_POST['libarticl'].'-'.$_POST['id_categ'].'-'.$_POST['type_article'].'-'.$_POST['prixachat'].'-'.$_POST['prixemballage'].'-'.$_POST['IDFOURNISSEURS'].'-'
    //.$_POST['conds'].'-'.$_POST['seuils'];

    $sql = "INSERT INTO bo_Articles (LIBARTICLE, IDCATEGORIE, TYPEARTICLE,PRIXACHATLIQUIDE,PRIXACHATEMBALLAGE,IDFOURNISSEURS,CONDITIONNEMENT,LIBELLEGROUPE,SEUIL) VALUES (:libarticl, :id_categ, :type_article, :prixachat
    , :prixemballage,:IDFOURNISSEURS,:conds,:grou,:seuils )";

    $data = array(

        ":libarticl" => $_POST['libarticl'],

        ":id_categ" => $_POST['id_categ'],

        ":type_article" => $_POST['type_article'],

        ":prixachat" => $_POST['prixachat'],

        ":prixemballage" => $_POST['prixemballage'],

        ":IDFOURNISSEURS" => $_POST['IDFOURNISSEURS'],

        ":conds" => $_POST['conds'],

        ":grou" => $_POST['grpe'],

        ":seuils" => $_POST['seuils'],


    );

    $exe = $DB->query($sql, $data);

    header("location: article.php");

}
if (isset($_POST['modifier_article'])) {
 
     $data =  array(
 
         $_POST['libarticl'],
        
         $_POST['id_categ'],
 
         $_POST['type_article'],
 
         $_POST['prixachat'],
 
         $_POST['prixemballage'],
 
         $_POST['IDFOURNISSEURS'],
 
        $_POST['conds'],
 
         $_POST['seuils'],

         $_POST['grpe'],
        
         $_POST['IDARTICLE']

 
     );
      

     $sql = "UPDATE bo_Articles SET LIBARTICLE=?,IDCATEGORIE=?,TYPEARTICLE=?, PRIXACHATLIQUIDE=?,PRIXACHATEMBALLAGE=?,IDFOURNISSEURS=?,CONDITIONNEMENT=?,SEUIL=?,LIBELLEGROUPE=? WHERE IDARTICLE=?";
   // echo $sql;
    $exe = $DB->query($sql, $data);
 
     header("location: article.php");
 
 }


?>