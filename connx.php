<?php
   
  Function ajout_vehicule($numImm,$marque,$modele,$annee,$couleur,$cylindree,$transmission,$tof)
	  {
		try{
      $pdo = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons','K330D)A.dbn2Rc');
		}
		catch(PDOException $e){
      echo $e->getMessage();
		}
  

		  $sql="INSERT INTO sen_voitures (plaque,Marque,Modele,Annee,couleur,Cylindree,Transmission,photo) VALUES 
		  (:numImm,:marque,:modele,:Annee,:couleur,:cylindree,:transmission,:tof)";
		  
		  $verify = $pdo->prepare($sql);
		  $ver=$verify->execute(array(":numImm"=>$numImm,":marque"=>$marque,":modele"=>$modele,":Annee"=>$annee,":couleur"=>$couleur,":cylindree"=>$cylindree,":transmission"=>$transmission,":tof"=>$tof));
		  
		  if($verify){
			 echo 'Ajout'; 
		  } else
		  {
			  echo 'Echec !';
		  }
		  
	  }
	Function ajout_client($prenom_nom,$adresse,$Date_naissance,$email,$Tel,$genre)
	  {
		  try{
     $pdo = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons','K330D)A.dbn2Rc');
		}
		catch(PDOException $e){
      echo $e->getMessage();
		}

		  $sql="INSERT INTO sen_client (prenom_nom,adresse,Date_naissance,email,Tel,genre) VALUES 
		  (:prenom_nom,:adresse,:Date_naissance,:email,:Tel,:genre)";
		  
		  $verify = $pdo->prepare($sql);
		  $ver=$verify->execute(array(":prenom_nom"=>$prenom_nom,":adresse"=>$adresse,":Date_naissance"=>$Date_naissance,":email"=>$email,":Tel"=>$Tel,":genre"=>$genre));
		  
		  if($verify){
			 echo 'Ajout'; 
		  } else
		  {
			  echo 'Echec !';
		  }
		 } 
	Function ajout_user($login,$mdp,$nom_afficher,$id_profil)
		{
		try{
		$pdo = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons','K330D)A.dbn2Rc');
		}
		catch(PDOException $e){
		echo $e->getMessage();
		}
			$sql="INSERT INTO sen_user (login,mdp,nom_afficher,id_profil) VALUES  (:login,:mdp,:nom_afficher,:id_profil)";
			$verify = $pdo->prepare($sql);
			$ver=$verify->execute(array(":login"=>$login,":mdp"=>$mdp,":nom_afficher"=>$nom_afficher,":id_profil"=>$id_profil));
			
			if($verify){
			 echo 'Ajout'; 
		  } else
		  {
			  echo 'Echec !';
		  }
		}
	Function ajout_reserv($date_reserv,$id_client,$idTarif,$date_depart,$heure_dep,$date_retour)
		{
		try{
		$pdo = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons','K330D)A.dbn2Rc');
		}
		catch(PDOException $e){
		echo $e->getMessage();
		}
		$sql="INSERT INTO sen_reserv (date_reserv,id_client,idTarif,date_depart,heure_dep,date_retour) 
		VALUES  (:date_reserv,:id_client,:idTarif,:date_depart,:heure_dep,:date_retour)";
		
		 $verify = $pdo->prepare($sql);
		  $ver=$verify->execute(array(":date_reserv"=>$date_reserv,":id_client"=>$id_client,":idTarif"=>$idTarif,":date_depart"=>$date_depart,
		  ":heure_dep"=>$heure_dep,":date_retour"=>$date_retour));
		
		  if($verify){
			 echo 'Ajout'; 
		  } else
		  {
			  echo 'Echec !';
		  }
		}
	Function ajout_location($IdClient,$date_depart,$date_retour,$heure_dep,$idTarifs)
		{
			
		try{
		$pdo = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons','K330D)A.dbn2Rc');
		}
		catch(PDOException $e){
		echo $e->getMessage();
		}

		$sql="INSERT INTO  sen_locations (IdClient,date_depart,date_retour,heure_dep,idTarif) 
		VALUES  (:IdClient,:date_depart,:date_retour,:heure_dep,:idTarif)";
		
		$verify = $pdo->prepare($sql);
		 $ver=$verify->execute(array(":IdClient"=>$IdClient,":date_depart"=>$date_depart,":date_retour"=>$date_retour,":heure_dep"=>$heure_dep,":idTarif"=>$idTarifs));
		 
		  if($verify){
			 echo 'Ajout'; 
		  } else
		  {
			  echo 'Echec !';
		  }
		}
	
	Function ajout_perso($prenom_noms,$adresses,$date_naiss,$emails,$profession,$cin)
		{
		  try{
			$pdo = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons','K330D)A.dbn2Rc');
			}
			catch(PDOException $e){
			echo $e->getMessage();
			}$sql="INSERT INTO sen_personnel (prenom_noms,adresses,date_naiss,emails,profession,cin) VALUES 
		  (:prenom_noms,:adresses,:date_naiss,:emails,:profession,:cin)";
		  
		  $verify = $pdo->prepare($sql);
		  $ver=$verify->execute(array(":prenom_noms"=>$prenom_noms,":adresses"=>$adresses,":date_naiss"=>$date_naiss,":emails"=>$emails,":profession"=>$profession,":cin"=>$cin));
		  
		  if($verify){
			 echo 'Ajout'; 
		  } else
		  {
			  echo 'Echec !';
		  }
			
		}
	Function envoi_mail($email,$adresse,$prenom_nom,$date_reserv,$heureres,$destination,$num)
	{
		$to = $email;
		$subject = "TICKET  ELECTRONIQUE SENCAR SERVICES";
		$dat=explode('/',$date_reserv);
		$message = "
		<html>
		<head>
		<title>Ticket électronique Sencar Services</title>
		<link rel='stylesheet' href='https://rema-consultingsn.com/sencar/plugins/fontawesome-free/css/all.min.css'>
		<link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
		<link rel='stylesheet' href='https://rema-consultingsn.com/sencar/dist/css/adminlte.min.css'>
		<link rel='stylesheet' href='https://rema-consultingsn.com/sencar/plugins/summernote/summernote-bs4.css'>
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700' rel='stylesheet'>
		</head>
		<body>
		<div class='card-body'>
		<h3>N° Ticket : sen".$dat[2].$num."</h3>
		<p><h4>Bonjour (Bonsoir) Monsieur ou Madame <h3>".$prenom_nom."</h3>. <br> Nous vous confirmons votre réservation pour un VTC ce <strong>".$date_reserv."</strong> à <strong>".$heureres."</strong> précises pour un trajet <br> 
		départ du <strong>".$adresse."</strong>  vers <strong>".$destination."</strong>. <br><br> Nous vous contacterons arrivé sur place.<br> 
		Merci d’avoir choisi Sencar Services. <br>
		Bien Cordialement.<br><br>
		Modes de paiement disponibles
		<img src='https://rema-consultingsn.com/sencar/dist/img/wave.png' alt='code marchand wave' width='100' height='100'>&nbsp;&nbsp;&nbsp;
		<img src='https://rema-consultingsn.com/sencar/dist/img/orange_money.png' alt='code marchand OM' width='100' height='100'><br></p>
                      
                      <p>Merci,</p>
                      <p>D. Ndiaye - Directeur</p>
		</div>			  
		</body>
		</html>
		";

		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= 'From: SENCAR SERVICES <contact@sencar-services.com>' . "\r\n";
		$headers .= 'Cci: moustapha@ajf-afrique.org' . "\r\n";

		mail($to,$subject,$message,$headers);
		if (mail($to, $subject, $message, $headers))	
		{
		echo 'Votre message a bien été envoyé ';
		header('location:menu.php?s=tab_resv');
		}
		else // Non envoyé
		{
			echo "Votre message n'a pas pu être envoyé";
		}
	}
				
	

	
	// Upload 
	 Function upload() 
	 {
		$target_dir = "dist/img/";
		$_FILES["fileToUpload"]=$_GET['fileToUpload'];
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		  if($check !== false) {
			echo "Ce fichier est une image - " . $check["mime"] . ".";
			$uploadOk = 1;
		  } else {
			echo "ce fichier n'est pas de format image.";
			$uploadOk = 0;
		  }
		}

		// Check if file already exists
		if (file_exists($target_file)) {
		  echo "Désolé, fichier existe déjà.";
		  $uploadOk = 0;
		}

		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		  echo "Désole, la taille du fichier est trop grande.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  echo "Désolé, seuls les formats JPG, JPEG, PNG & GIF files sont autorisés.";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  echo "Désolé, votre fichier n'a pas été chargé!.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "Le fichier". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " a bien été téléchargé.";
		  } else {
			echo "Désolé, il y a une erreur lors du chargement du fichier.";
		  }
		}
		return $target_dir;
	}
?>
