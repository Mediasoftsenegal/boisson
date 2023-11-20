<?php
$pdo = new PDO('mysql:host=localhost;dbname=remacons_wp101;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
session_start();
if (isset($_POST['bt_conn'])) {
	$login = $_POST["login"];
	$pass = $_POST["pass"];
	//echo $login.' '.$pass;
	
	$valider = $_POST["login"];
	
	$erreur = "";
	if (isset($valider)) 
		{
			$verify = $pdo->prepare("SELECT * From bo_users WHERE LOGIN_USER=? and PASSWORD_USER=? limit 1");
			$verify->execute(array($login, $pass));
			$user = $verify->fetchAll();
		
				if (count($user) > 0) 
				{
					$_SESSION["nom"] = ucfirst(strtolower($user[0]["NOMUTILISATEUR"]));
					$_SESSION["connecter"] = "Oui";
					$_SESSION["id"] = $user[0]["IDUTILISATEUR"];
					//echo 'ID:'.$_SESSION["id_user"] ;
					$_SESSION["profil"] = $user[0]["PROFIL"];
					//echo 'Profileur:'.$_SESSION["Profileur"] ;
					header("location:tabbord/tabbord.php");
				} else
				{
				
			//	header("location:login.php");
				echo "Utilisateur ou mot de passe non défini dans la plateforme !"; 
				header ("Refresh: 1;URL=index.php");
				}
		}
	}
?>