<?php require '../page/header.php'; ?>

<!-- Content Header (Page header) -->

<div class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h1 class="m-0 text-dark"><i class="fa-solid fa-file-contract"> </i>&nbsp;&nbsp;Fournisseurs</h1>

            </div><!-- /.col -->

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="#">Accueil</a></li>

                    <li class="breadcrumb-item active">Fournisseurs</li>

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
						<h3 class="card-title">Liste des Fournisseurs </h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">                   

                </div>

                <!-- /.card-header -->

                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">

                        <thead>

                            <tr>

                                <th>Nom</th>

                                <th>Adresse</th>

                                <th>Numéro</th>

                                <th>Type</th>

                                <th>Fixe</th>

                                <th>Fax</th>

                                <th>Email</th>

                                <th>Mobile</th>

								<th>Actions</th>
                            </tr>

                        </thead>

                        <tfoot>

                            <tr>

                                <th>Nom</th>

                                <th>Adresse</th>

                                <th>Numéro</th>

                                <th>Type</th>

                                <th>Fixe</th>

                                <th>Fax</th>

                                <th>Email</th>

                                <th>Mobile</th>

								<th>Actions</th>

                            </tr>

                        </tfoot>

                        <tbody>

                        <?php $fournis = $DB->query('SELECT * FROM bo_Fournisseur'); 

                        foreach ($fournis as $fourni):?>

                            <tr>

                                <td><?= $fourni->NOMFOURNISSEUR ?></td>

                                <td><?= $fourni->ADRESSEFOUR ?></td>

                                <td><?= $fourni->NUMFOURNISSEUR ?></td>

                                <td><?= $fourni->TYPE_FOURNISSEURS ?></td>

                                <td><?= $fourni->TEL ?></td>

                                <td><?= $fourni->FAX ?></td>

                                <td><?= $fourni->EMAIL ?></td>

                                <td><?= $fourni->MOBILE ?></td>

								<td><a class="add" href="fournisseur.php?id=<?= $fourni->IDFOURNISSEURS ?>"><i class="fas fa-shopping-basket"></i></a></td>

                            </tr>

                        <?php endforeach ?>

                        </tbody>

                    </table>
					</div>

</div>

</div>

<div class="col-4">

<div class="card card-primary card-outline">

<form action="insert_fournisseur.php" method="POST">

    <div class="card-header">

        <h4 class="card-title">Formulaire fournisseur</h4>

    </div>

    <div class="card-body">
	<div class="card-body">
<dl>
<dt>Nouveau fournisseur</dt>
<dd>Pour ajouter un fournisseur  cliquer sur le menu fournisseur en haut,</dd>
<dd>ensuite renseigner le formulaire et cliquer sur le bouton ajouter</dd>
<dt>Modification</dt>
<dd>Pour modifier cliquer sur l'icône dans la colonne action</dd>
</dl>
</div>
    <div class="form-group">

        <label class="control-label">Nom</label>
        <?
        if (isset($_GET['id'])){
        $reponse = $DB->query("SELECT * FROM bo_Fournisseur 
        WHERE bo_Fournisseur.IDFOURNISSEURS  =".$_GET['id']); 
        foreach ($reponse as $donne):?>
        <input type="hidden" name="IDFOURNISSEURS" class="form-control is-warning" id="inputWarning" value="<?= $_GET['id'] ?>">
        <input type="text" name="NOMFOURNISSEUR" class="form-control is-warning" id="inputWarning" value="<?= $donne->NOMFOURNISSEUR ?>">
        <? endforeach; ?>
        <? } else { ?>  
        <input class="form-control" name="NOMFOURNISSEUR" placeholder="Nom" type="text"/>
        <? } ?>

</div> 		
    

    <div class="form-group">

    <label class="control-label">Adresse</label>
    
	<?
             if (isset($_GET['id'])){?>
            <input type="text" name="ADRESSEFOUR" class="form-control is-warning" id="inputWarning" value="<?= $donne->ADRESSEFOUR ?>"> 
            <? } else { ?> 
            <input class="form-control" name="ADRESSEFOUR" placeholder="Adresse" type="int"/>
            <? } ?>

    </div>
    <div class="form-group">

<label class="control-label">Numéro</label>
<?
             if (isset($_GET['id'])){?>
            <input type="text" name="NUMFOURNISSEUR" class="form-control is-warning" id="inputWarning" value="<?= $donne->NUMFOURNISSEUR ?>"> 
            <? } else { ?> 
            <input class="form-control" name="NUMFOURNISSEUR" placeholder="Numéro" type="int"/>
            <? } ?>

</div>
        <div class="form-group">

		<label class="control-label">Fournisseur</label>

<select name="IDFOURNISSEURS" class="form-control select">
<?
if (isset($_GET['id'])){ ?>
	<option value="<?= $donne->TYPE_FOURNISSEURS ?>"><?= $donne->TYPE_FOURNISSEURS ?></option>
	<? } else { ?>  
	<option>Choisir un type de fournisseur</option>

	<? $fourni = $DB->query('SELECT DISTINCT TYPE_FOURNISSEURS FROM bo_Fournisseur'); 

	foreach ($fourni as $fourniss):?>

	<option value="<?= $fourniss->TYPE_FOURNISSEURS ?>"><?= $fourniss->TYPE_FOURNISSEURS ?></option>

	<? endforeach; ?>
	<? } ?>
</select>
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

        <button type="submit" class="btn btn-success" name="valider_four">Ajouter</button>
        <button type="submit" class="btn btn-warning" name="modifier_four">Modifier</button>    
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