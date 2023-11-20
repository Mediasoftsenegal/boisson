<?php require '../page/header.php'; ?>
<?php
$id_commande=$_GET['id'];
$commandes = $DB->query('SELECT * FROM bo_Commandes inner join bo_client 
WHERE bo_Commandes.id_client =bo_client.IDCLIENTS
AND Id_commande='.$id_commande);
foreach ($commandes as $commande):
$datecom=explode('-',$commande->Date_commande);

?>
<?
function ident($idart){
        $pdo = new PDO('mysql:host=localhost;dbname=remacons_wp101;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');

        $artic =$pdo->query("SELECT * FROM bo_Articles where LIBARTICLE='$idart'"); 
           
        foreach ($artic as $row) {

        $libart = $row['LIBELLEGROUPE'];

        return $libart ;
       
        }
    }
    ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" href="../dist/css/adminlte.min.css?v=3.2.0">
<script nonce="5d8abc88-b09b-4906-ad75-e034a714eca3">(function(w,d){!function(di,dj,dk,dl){di[dk]=di[dk]||{};di[dk].executed=[];di.zaraz={deferred:[],listeners:[]};di.zaraz.q=[];di.zaraz._f=function(dm){return function(){var dn=Array.prototype.slice.call(arguments);di.zaraz.q.push({m:dm,a:dn})}};for(const dp of["track","set","debug"])di.zaraz[dp]=di.zaraz._f(dp);di.zaraz.init=()=>{var dq=dj.getElementsByTagName(dl)[0],dr=dj.createElement(dl),ds=dj.getElementsByTagName("title")[0];ds&&(di[dk].t=dj.getElementsByTagName("title")[0].text);di[dk].x=Math.random();di[dk].w=di.screen.width;di[dk].h=di.screen.height;di[dk].j=di.innerHeight;di[dk].e=di.innerWidth;di[dk].l=di.location.href;di[dk].r=dj.referrer;di[dk].k=di.screen.colorDepth;di[dk].n=dj.characterSet;di[dk].o=(new Date).getTimezoneOffset();if(di.dataLayer)for(const dw of Object.entries(Object.entries(dataLayer).reduce(((dx,dy)=>({...dx[1],...dy[1]})))))zaraz.set(dw[0],dw[1],{scope:"page"});di[dk].q=[];for(;di.zaraz.q.length;){const dz=di.zaraz.q.shift();di[dk].q.push(dz)}dr.defer=!0;for(const dA of[localStorage,sessionStorage])Object.keys(dA||{}).filter((dC=>dC.startsWith("_zaraz_"))).forEach((dB=>{try{di[dk]["z_"+dB.slice(7)]=JSON.parse(dA.getItem(dB))}catch{di[dk]["z_"+dB.slice(7)]=dA.getItem(dB)}}));dr.referrerPolicy="origin";dr.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(di[dk])));dq.parentNode.insertBefore(dr,dq)};["complete","interactive"].includes(dj.readyState)?zaraz.init():di.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head>
<body>
<div class="wrapper">
<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1><i class="fa-solid fa-indent"> </i>&nbsp;&nbsp;Commande détaillée</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Accueil</a></li>
<li class="breadcrumb-item active"><a href="commande.php">commandes</a></li>
<li class="breadcrumb-item active">Détail commande</li>
</ol>
</div>
</div>
</div>
</section>
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">

<form method="POST" action="neo_fact.php">
<div class="invoice p-3 mb-3">
<div class="row">
<div class="col-12">
<h4>
<?
    $proprio = $DB->query('SELECT * FROM bo_owner where idowner=3');
    foreach ($proprio as $rpo){?>
    <i class="fas fa-globe"></i>  <?=$rpo->ownerEse?>, Dépositaire de boissons
 
<small class="float-right">Date:<?=date( "d/m/Y ")?></small>

</h4>
</div>
    
</div>

<div class="row invoice-info">
<div class="col-sm-4 invoice-col">

<address>
<strong><?=$rpo->adreEse ?></strong><br>
<?=$rpo->rcEse ?><br>
<?=$rpo->nineaEse ?><br>
Tel. <?=$rpo->TelEse ?><br>
Email: <?=$rpo->emailEse ?>
</address>
</div>
<? } ?>
<div class="col-sm-4 invoice-col">
Client
<address>
<strong><?=$commande->NOMCLIENT?></strong><br>
<?=$commande->ADRESSE?><br>
<?=$commande->MOBILE?><br>
Tel: <?=$commande->TEL?><br>
Email: <?=$commande->EMAIL?>
</address>
</div>

<div class="col-sm-4 invoice-col">
<b>Numéro bon de commande <?=$commande->num_fac?></b><br>
<input type="hidden" id="num_fac" name="num_fac" value="<?=$commande->num_fac?>">
<input type="hidden" id="Id_commande" name="Id_commande" value="<?=$id_commande?>">
<br>
<b>Order ID:</b> <?=$commande->Id_commande?><br>
<b>Date commande : </b><?=$datecom[2].'/'.$datecom[1].'/'.$datecom[0]?><br>
<b>Montant:</b> <?=number_format($commande->Montant_commande,0,","," ")?>
<input type="hidden" id="Montant_fact" name="Montant_fact" value="<?=$commande->Montant_commande?>">
</div>

</div>


<div class="row">
<div class="col-12 table-responsive">
<table class="table table-striped">
<thead>
<tr>
<th>Qté</th>
<th>libellé Groupe</th>
<th>Prix unitaire </th>
<th>Article</th>
<th>Montant total</th>
</tr>
</thead>
<tbody>
<?php  

	$des= explode(",",$commande->des);
    $prix_uni= explode(",",$commande->pu);
    $qte= explode(",",$commande->qty);
    
?>
<? for ($x=0; $x<count($des);$x++) {?>
<tr>

<td><?= $qte[$x]?></td>
<td><?=ident($des[$x])?></td> 
<td><?=$prix_uni[$x]?></td>
<td><?=$des[$x] ?></td>
<td><?= number_format($qte[$x]*$prix_uni[$x],0,","," ")?></td>
</tr>
<? } ?>
<?php endforeach ?>
</tbody>
</table>
</div>

</div>

<div class="row">

<div class="col-6">
<p class="lead">Mode de paiement:</p>

 <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
EN ESPECES OU PAR CHEQUES
</p>
</div>

<div class="col-6">
<p class="lead">Montant de la commande au  <?=$datecom[2].'/'.$datecom[1].'/'.$datecom[0]?> </p>
<div class="table-responsive">
<table class="table">
<tr>
<th style="width:50%"></th>
<td></td>
</tr>
<tr>
<th style="width:50%">Montant Total:</th>
<td><?=number_format($commande->Montant_commande,0,","," ")?>F CFA</td>
</tr>

</table>
</div>
</div>

</div>


<div class="row no-print">
<div class="col-12">
<a href="fact.php" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Imprimer</a>
<button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Valider la commande </button>


</div>
</div>
</div>
</form>
</div>
</div>
</div>
</section>

</div>





</div>
<?php require '../page/footer.php'; ?>

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/adminlte.min.js?v=3.2.0"></script>
<script src="../dist/js/demo.js"></script>
</body>
</html>
