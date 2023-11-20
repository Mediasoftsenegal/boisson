<?php require 'db.class.php'; $DB = new DB(); ?>
<?php
	var_dump($_GET);
$sql = "INSERT INTO bo_client (NOMCLIENT,ADRESSE,TYPECLIENT,CODECLIENT,TEL,FAX,EMAIL,MOBILE,SOCIETE,EXEMPTTVA,BENEFICAIRE,AVECTVA,ETATCLIENT) VALUE (?,?,?,?,?,?,?,?,?,?,?,?)";
$data = array($_GET['NOMCLIENT'],$_GET['ADRESSE'],$nump,$_GET['CODECLIENT'],$_GET['TYPECLIENT'],$_GET['TEL'],$_GET['FAX'],$_GET['EMAIL'],$_GET['MOBILE'],$_GET['SOCIETE'],$_GET['EXEMPTTVA'],$_GET['BENEFICAIRE'],$_GET['AVECTVA'],$_GET['ETATCLIENT']);
	//$don = $DB->query( );
echo '<hr>';
	echo $sql;
	echo '<hr>';
	echo 'salut';
	$a = $DB->query('SELECT * FROM bo_client');
	echo '<hr>';
	var_dump($data);
	for ( $i=0; $i++; $i>14 ) :
		echo $data[$i];
	endfor;
	echo $data[0];