<? require '../page/_header.php';

if($_FILES['logoEses']['error']){
    switch ($_FILES['logoEses']['error']){
        case 1 : // UPLOAD_ERR_INI_SIZE
            Echo 'le fichier dépasse la limite autorisée par le serveur !';
            break;
         case 2 : // UPLOAD_ERR_FORM_SIZE
            Echo 'Le fichier dépasse la limite autorisée dans le formulaire entreprise !';
            break; 
         case 3 : // UPLOAD_ERR_PARTIAL
            Echo 'L\'envoi du fichier a été intérrompu par le transfert !' ;
            break;
         case 4 : //UPLOAD_ERR_NO_FILE
            Echo 'Le fichier envoyé a une taille nulle !';
            break;        
    }
    }else {
        $nom =$_FILES['logoEses']['tmp_name'];
       // echo 'nom temporaire ='.$nom.'<br>';
        $nomdestination = '../dist/img/'.$_FILES['logoEses']['name'] ;
      //  echo 'destination ='.$nomdestination.'<br>';
        move_uploaded_file($nom,$nomdestination);
    }
  

if (isset($_POST['valider'])) {
    
    $sql = "INSERT INTO bo_owner (ownerEse, adreEse,TelEse, emailEse,nineaEse,rcEse,logoEse) VALUES (:ownerEsed, :adreEsed, :TelEsed, :emailEsed, :nineaEsed, :rcEsed, :logoEsed)";

    $data = array(

        ":ownerEsed" => $_POST['nomEses'],

        ":adreEsed" => $_POST['adreEses'],

        ":TelEsed" => $_POST['telEses'],

        ":emailEsed" => $_POST['EmailEses'],

        ":nineaEsed" => $_POST['ninEses'],

        ":rcEsed" => $_POST['rcEses'],

        ":logoEsed" => $nomdestination, 

    );

    $exe = $DB->query($sql, $data);

    header("location: param.php");
 } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }    
