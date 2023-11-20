<?php require '../page/header.php'; ?>
<?php $id = $_GET['id'];
$ts = $DB->query("SELECT * 
FROM ((bo_tarif 
INNER JOIN bo_client ON bo_tarif.id_client = bo_client.IDCLIENTS) 
INNER JOIN bo_Articles ON bo_tarif.id_article = bo_Articles.IDARTICLE) 
WHERE bo_tarif.id_client = $id 
GROUP BY bo_tarif.id_client ");?>
<!-- Content Header (Page header) -->

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <? foreach ($ts as $t) { ?>
                    <h1 class="m-0 text-dark">Détails Tarifications du client : <?= $t->NOMCLIENT ?></h1>
                <? } ?>
			</div><!-- /.col -->
			<div class="col-sm-6">    
				<ol class="breadcrumb float-sm-right">        
					<li class="breadcrumb-item">
						<a href="tabbord.php">Accueil</a></li>        
						<li class="breadcrumb-item active">Tarification</li>
					</li>
				</ol>
			</div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
	<div class="container-fluid">		
		<div class="row">			
			<div class="col-8">
				<div class="card card-primary card-outline">
					<div class="card-header">
						<h3 class="card-title">Liste des tarifs</h3>
						<a href="tarif.php" class="btn btn-dark" style="float: right;">Retour</a>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Articles</th>
									<th>Montant</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Articles</th>
									<th>Montant</th>
									<th>Action</th>
								</tr>
							</tfoot>
                            <tbody>
							<?php $tarifs = $DB->query("SELECT * FROM ((bo_tarif INNER JOIN bo_client ON bo_tarif.id_client = bo_client.IDCLIENTS) INNER JOIN bo_Articles ON bo_tarif.id_article = bo_Articles.IDARTICLE) WHERE id_client = $id"); 
							//$tarifs = $DB->query("SELECT * FROM bo_tarif INNER JOIN bo_client ON bo_tarif.id_client = bo_client.IDCLIENTS GROUP BY bo_tarif.id_client");
							foreach ($tarifs as $tarif):?>
								<tr>
									<td><?= $tarif->LIBARTICLE ?></td>
                                    <td><?= $tarif->montant ?></td>
									<td><a class="add" href="detail_tarif.php?id=<?= $_GET['id'] ?>&id_article=<?= $tarif->id_article?>"><i class="fas fa-shopping-basket"></i></a></td>
								</tr>
							<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-4">
			<div class="card card-primary card-outline">
				<div class="card-header">
					<h4 class="card-title">Formulaire Détail tarif</h4>
				</div>
				<div class="card-body">
					<div class="card">
	<div class="card-header">
	<h3 class="card-title">
		<i class="fas fa-text-width"></i>
		Détails de la séléction
	</h3>
</div>

<div class="card-body">
	<dl>
		<dt>Nouvelles tarifications</dt>
		<dd>Pour ajouter une tarification  cliquer sur le menu Tarif en haut,</dd>
		<dd>ensuite renseigner le formulaire et cliquer sur le bouton ajouter</dd>
		<dt>Modification</dt>
		<dd>Pour modifier cliquer sur l'icône dans la colonne action</dd>
	</dl>
</div>

</div>
	<? if(isset($_GET['id_article'])) { ?>
		<form action="modif_tarif.php" method="POST">
			<? $clients = $DB->query('SELECT * FROM ((bo_tarif INNER JOIN bo_client ON bo_tarif.id_client = bo_client.IDCLIENTS) INNER JOIN bo_Articles ON bo_tarif.id_article = bo_Articles.IDARTICLE) WHERE id_client = '.$_GET['id'].' AND bo_tarif.id_article ='.$_GET['id_article']);
			foreach ($clients as $client):?>
			<div class="card-body">
				<div class="form-group">
					<label>Nom client</label>
					<select class="form-control" id="select" name="client">
						<option value="<?= $client->IDCLIENTS ?>"><?= $client->NOMCLIENT ?></option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Produit</label>
					<select name="produit" class="form-control select">
						<option value="<?= $client->IDARTICLE ?>"><?= $client->LIBARTICLE ?></option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Tarif</label>
					<input class="form-control" name="tarif" value="<?= $client->montant ?>" type="number"/>
				</div>
			</div>
			<? endforeach; ?>
			<div class="card-footer">
				<!-- <button type="submit" class="btn btn-success" name="valider_client">Ajouter</button> -->
				<button type="submit" class="btn btn-warning" name="modifier">Modifier</button>    
			</div>
		</form>
	<? } else { ?>
		<form action="insert_tarif.php" method="POST">
			<div class="card-body">
				<div class="form-group">
					<label>Nom client</label>
					<select class="form-control" id="select" name="client">
					<? $clientss = $DB->query('SELECT * FROM bo_client'); 
					foreach ($clientss as $clientc):?>
					<option value="<?= $clientc->IDCLIENTS ?>"><?= $clientc->NOMCLIENT ?></option>
					<? endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Produit</label>
					<select name="produit" class="form-control select">
						<option>Choisir Produit</option>
						<? $products = $DB->query('SELECT * FROM bo_Articles'); 
					foreach ($products as $product):?>
					<option value="<?= $product->IDARTICLE ?>"><?= $product->LIBARTICLE ?></option>
					<? endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Tarif</label>
					<input class="form-control" name="tarif" placeholder="Tarif client" type="number"/>
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-success" name="valider">Ajouter</button>
				<!-- <button type="submit" class="btn btn-warning" name="modifier_client">Modifier</button>  -->   
			</div>
		</form>
	<? } ?>
</div>    
		</div>
	</div>
</section>
<?php require '../page/footer.php'; ?>