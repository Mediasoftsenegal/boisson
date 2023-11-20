<?php require '../page/header.php'; ?>

<!-- Content Header (Page header) -->

<div class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h1 class="m-0 text-dark"><i class="fa-solid fa-address-card"> </i>&nbsp;&nbsp;Clients</h1>

            </div><!-- /.col -->

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="tabbord.php">Accueil</a></li>

                    <li class="breadcrumb-item active">Clients</li>

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
						<h3 class="card-title">Liste des clients </h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">                   

                </div>

                <!-- /.card-header -->

                <div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th></th>
									<th>Nom Client</th>
									<th>Adresse</th>
									<th>Code client</th>
									<th>Type client</th>
									<th>Tel.</th>
									<th>Mobile</th>
									<th>Bénéficiaire</th>
									<th>Etat</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th></th>
									<th>Nom Client</th>
									<th>Adresse</th>
									<th>Code client</th>
									<th>Type client</th>
									<th>Tel.</th>
									<th>Mobile</th>
									<th>Bénéficiaire</th>
									<th>Etat</th>
									<th>Actions</th>
								</tr>
							</tfoot>
							<tbody>
							<?php $clients = $DB->query('SELECT * FROM bo_client'); 
							$i = 0;
							foreach ($clients as $client):
							$i++ ?>
								<tr>
									<td><?= $i ?></td>
									<td><?= $client->NOMCLIENT ?></td>
									<td><?= $client->ADRESSE ?></td>
									<td><?= $client->CODECLIENT ?></td>
									<td><?= $client->TYPECLIENT ?></td>
									<td><?= $client->TEL ?></td>
									<td><?= $client->MOBILE ?></td>
									<td><?= $client->BENEFICAIRE ?></td>
									<td><?= $client->ETATCLIENT ?></td>
									<td><a class="add" href="client.php?id=<?= $client->IDCLIENTS ?>"><i class="fas fa-shopping-basket"></i></a></td>
								</tr>
							<?php endforeach ?>
							</tbody>
						</table>
						</div>

</div>

</div>

<div class="col-4">

<div class="card card-primary card-outline">
  
<form action="insert_client.php" method="POST">

    <div class="card-header">

        <h4 class="card-title">Formulaire client</h4>

    </div>

    <div class="card-body">
	<div class="card-body">
<dl>
<dt>Nouveau client</dt>
<dd>Pour ajouter un nouveau client   cliquer sur le menu client en haut,</dd>
<dd>ensuite renseigner le formulaire et cliquer sur le bouton ajouter</dd>
<dt>Modification</dt>
<dd>Pour modifier cliquer sur l'icône dans la colonne action</dd>
</dl>
</div>
    <div class="form-group">

        <label class="control-label">Nom</label>
        <?
        if (isset($_GET['id'])){
        $reponse = $DB->query("SELECT * FROM bo_client 
        WHERE bo_client.IDCLIENTS  =".$_GET['id']); 
        foreach ($reponse as $donne):?>
        <input type="hidden" name="IDCLIENTS" class="form-control is-warning" id="inputWarning" value="<?= $_GET['id'] ?>">
        <input type="text" name="NOMCLIENT" class="form-control is-warning" id="inputWarning" value="<?= $donne->NOMCLIENT ?>">
        <? endforeach; ?>
        <? } else { ?>  
        <input class="form-control" name="NOMCLIENT" placeholder="Nom client" type="text"/>
        <? } ?>

</div> 		
    

    <div class="form-group">

    <label class="control-label">Adresse</label>
    
	<?
             if (isset($_GET['id'])){?>
            <input type="text" name="ADRESSE" class="form-control is-warning" id="inputWarning" value="<?= $donne->ADRESSE ?>"> 
            <? } else { ?> 
            <input class="form-control" name="ADRESSE" placeholder="Adresse" type="int"/>
            <? } ?>

    </div>
    <div class="form-group">

		<label class="control-label">Fournisseur</label>

<select name="TYPECLIENT" class="form-control select">
<?
if (isset($_GET['id'])){ ?>
	<option value="<?= $donne->TYPECLIENT ?>"><?= $donne->TYPECLIENT ?></option>
	<? } else { ?>  
	<option>Choisir un type de client</option>

	<? $client = $DB->query('SELECT DISTINCT TYPECLIENT FROM bo_client'); 

	foreach ($client as $clients):?>

	<option value="<?= $clients->TYPECLIENT ?>"><?= $clients->TYPECLIENT ?></option>

	<? endforeach; ?>
	<? } ?>
</select>
    </div>
	<div class="form-group">

<label class="control-label">Numéro</label>
<?
    if (isset($_GET['id'])){?>
    <input type="text" name="CODECLIENT" class="form-control is-warning" id="inputWarning" value="<?= $donne->CODECLIENT ?>"> 
    <? } else { ?> 
    <input class="form-control" name="CODECLIENT" placeholder="Code client" type="int"/>
    <? } ?>
</div>
<div class="form-group">

            <label class="control-label">Tel.</label>
            <?
             if (isset($_GET['id'])){?>
            <input type="text" name="TEL" class="form-control is-warning" id="inputWarning" value="<?= $donne->TEL ?>"> 
            <? } else { ?> 
            <input class="form-control" name="TEL" placeholder="Tel." type="text"/>
            <? } ?>
        </div>
		<div class="form-group">

		<label class="control-label">Fax.</label>
		<?
		if (isset($_GET['id'])){?>
		<input type="text" name="FAX" class="form-control is-warning" id="inputWarning" value="<?= $donne->FAX ?>"> 
		<? } else { ?> 
		<input class="form-control" name="FAX" placeholder="Fax." type="text"/>
		<? } ?>
		</div>
        
        <div class="form-group">
		<label class="control-label">Email.</label>
		<?
		if (isset($_GET['id'])){?>
		<input type="email" name="EMAIL" class="form-control is-warning" id="inputWarning" value="<?= $donne->EMAIL ?>"> 
		<? } else { ?> 
		<input type="email" class="form-control" name="EMAIL" placeholder="Email." type="text"/>
		<? } ?>
		</div>
		<div class="form-group">
		<label class="control-label">Mobile</label>
		<?
		if (isset($_GET['id'])){?>
		<input type="text" name="MOBILE" class="form-control is-warning" id="inputWarning" value="<?= $donne->MOBILE ?>"> 
		<? } else { ?> 
		<input type="text" class="form-control" name="MOBILE" placeholder="Mobile"/>
		<? } ?>
		</div>

</div>     
                   
    </div>

    <div class="card-footer">

        <button type="submit" class="btn btn-success" name="valider_client">Ajouter</button>
        <button type="submit" class="btn btn-warning" name="modifier_client">Modifier</button>    
    </div>

</form>

</div>           
                </div>
                </div>

            </div>

        </div>

    </div>

</section>
<?php require '../page/footer.php'; ?>