<? require '../page/_header.php';

if (isset($_POST['valider'])) {

    //echo $_POST['PROFIL'].'-'.$_POST['LOGINS'].'-'.$_POST['NOMUTILISATEUR'].'-'.$_POST['MDP'];

    $sql = "INSERT INTO bo_users (PROFIL, LOGIN_USER, PASSWORD_USER,NOMUTILISATEUR) VALUES (:PROFIL, :LOGINS, :MDP, :NOMUTILISATEUR)";
    
    $data = array(

        ":PROFIL" => $_POST['PROFIL'],

        ":LOGINS" => $_POST['LOGINS'],

        ":MDP" => $_POST['MDP'],

        ":NOMUTILISATEUR" => $_POST['NOMUTILISATEUR'],

    );

    $exe = $DB->query($sql, $data);

    header("location: user.php");

}

?>