<?php require '../page/header.php'; ?>
<?php
  if (isset($_POST['ETS'])){
  
    $sql="SELECT * FROM `bo_factures`  INNER JOIN `bo_Commandes`
    WHERE `bo_factures`.`Id_commande`=`bo_Commandes`.`Id_commande`
    AND `bo_factures`.`Date_factures` BETWEEN '".$_POST['datedeb']."' AND '".$_POST['datefin']."'
    AND `bo_Commandes`.`id_client`=".$_POST['client'];

    $suivi = $DB->query($sql); 
  }
  
  function idente($idcli){
          $pdo = new PDO('mysql:host=localhost;dbname=remacons_wp101;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
  
          $clie =$pdo->query('SELECT * FROM bo_client where IDCLIENTS='.$idcli); 
             
          foreach ($clie as $row) {
  
          $nomcli = $row['NOMCLIENT'];
  
          return $nomcli ;
         
          }
      }
      function moisd($ldates)
      {
        $smois=explode('-',$ldates);
        $ann=$smois[0]; 
        $lmois=$smois[1];

        switch ($lmois)
        {
            CASE'01': $moisf="JANVIER"; break;CASE'02': $moisf="FEVRIER"; break;CASE'03': $moisf="MARS"; break;CASE'04': $moisf="AVRIL"; break;CASE'05': $moisf="MAI"; break;CASE'06': $moisf="JUIN"; break;
            CASE'07': $moisf="JUILLET"; break;CASE'08': $moisf="AOUT"; break;CASE'09': $moisf="SEPTEMBRE"; break;CASE'10': $moisf="OCTOBRE"; break;CASE'11': $moisf="NOVEMBRE"; break;CASE'12': $moisf="DECEMBRE"; break;
        }
        
        RETURN  $moisf.'-'.$ann;
      }

?>


<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fa-solid fa-money-bill-trend-up"> </i>&nbsp;&nbsp;Etat de suivi des factures</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="tabbord.php">Accueil</a></li>
            <li class="breadcrumb-item active">Factures</li>
        </ol>
    </div>

</div>
</div>
</div>
<form action="etat_suivi.php" method="POST">
<div class="info-box">
    <span class="info-box-icon bg-info"><i class="fa-solid fa-money-bill-trend-up"></i></span>
    <div class="col-md-2">
    <label class="control-label">Date début</label>   
    <input type="date" name="datedeb" class="form-control">
    </div>
    <div class="col-md-2">
    <label class="control-label">Date fin</label>    
    <input type="date" name="datefin" class="form-control" >
    </div>
    <div class="col-md-3">
    <label class="control-label">Client</label>    
    <select class="form-control" id="select" name="client">
	    <option>Choisir client</option>
		<? $clients = $DB->query('SELECT * FROM bo_client'); 
		foreach ($clients as $client):?>
		<option value="<?= $client->IDCLIENTS ?>"><?= $client->NOMCLIENT ?></option>
		<? endforeach; ?>
		</select>
    </div>
    <div class="col-md-3">  
   
    <button type="submit" name="ETS"class="btn btn-app bg-warning"><span class="badge bg-info"></span><i class="fas fa-search"></i>Valider</button>
    </div>
</div>
</form>
<div class="card">
<div class="card-header">
<div class="card-tools">
<div class="input-group input-group-sm" style="width: 150px;">
<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
<div class="input-group-append">
<button type="submit" class="btn btn-default">
<i class="fas fa-search"></i>
</button>
</div>
</div>
</div>
</div>
<label class="control-label">Etat de suivi de  <? $_POST['client']?>  pour la période :<? $_POST['datedeb']?> au <? $_POST['datefin']?> </label>  
<div class="card-body table-responsive p-0">
 <table class="table table-hover text-nowrap">
<thead>
<tr>
<th>Période</th>
<th>N° facture</th>
<th>Client</th>
<th>Date facture</th>
<th>Montant facture</th>
<th>Montant payé</th>
<th>Date paiement</th>
<th>Montant restant</th>
<th>Etat</th>
</tr>
</thead>
<tbody>
<tr>
 <?php foreach ($suivi as $suivit):
$moisd=moisd($suivit->Date_factures);
$datefact=explode('-',$suivit->Date_factures);
$datepaie=explode('-',$suivit->Date_paiement);
 $rest=$suivit->Montant_factures -$suivit->Montant_paye; ?>
<td><?= $moisd?></td>
<td><?= $suivit->num_facture?></td>
<td><?= idente($suivit->id_client) ?></td>
<td><span class="tag tag-success"><?= $datefact[2].'/'.$datefact[1].'/'.$datefact[0] ?></span></td>
<td><?= number_format($suivit->Montant_factures,0,","," ") ?></td>
<td><?= number_format($suivit->Montant_paye,0,","," ") ?></td>
<td><?=  $datepaie[2].'/'.$datepaie[1].'/'.$datepaie[0]  ?></td>
<td><?= number_format($rest,0,","," ") ?></td>
<td><?= $suivit->Etat_factures ?></td>
</tr>
<? 
$totfact=$totfact+$suivit->Montant_factures;
$totpaie=$totpaie+$suivit->Montant_paye;
$totreste=$totreste+$rest;
?>
<?php endforeach ?>

<tr>
<td></td>
<td></td>
<td></td>
<td><span class="tag tag-success"></span></td>
<td><?= number_format($totfact,0,","," ") ?></td>
<td><?= number_format($totpaie,0,","," ") ?></td>
<td></td>
<td><?= number_format($totreste,0,","," ") ?></td>
<td></td>
</tr>
</tbody>
</table>
</div>

</div>
</div>


</div>

   

</div><!-- /.row -->



</div><!-- /.container-fluid -->



</div>



<!-- /.content-header -->



<!-- Main content -->


<?php require '../page/footer.php'; ?>