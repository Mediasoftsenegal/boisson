<?php require '../page/header.php'; ?>



<!-- Content Header (Page header) -->



<div class="content-header">



    <div class="container-fluid">



        <div class="row mb-2">



            <div class="col-sm-6">



                <h1 class="m-0 text-dark">Taxes</h1>



            </div><!-- /.col -->



            <div class="col-sm-6">



                <ol class="breadcrumb float-sm-right">



                    <li class="breadcrumb-item"><a href="tabbord.php">Accueil</a></li>



                    <li class="breadcrumb-item active">Taxes</li>



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
						<h3 class="card-title">Taxes apposées sur les produits </h3>
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

									<th>Type de taxe</th>

									<th>Valeur taxe (%)</th>

									<th>Actions</th>

								</tr>

							</thead>

							<tfoot>

								<tr>

									<th></th>

									<th>Type de taxe</th>

									<th>Valeur taxe (%)</th>

									<th>Actions</th>

								</tr>

							</tfoot>

							<tbody>

							<?php $taxes = $DB->query('SELECT * FROM bo_taxes'); 

							$i = 0;

							foreach ($taxes as $taxe):

							$i++?>

								<tr>

									<td><?= $i ?></td>

									<td><?= $taxe->type_tax ?></td>

									<td><?= $taxe->valeur_tax ?></td>

									<td><a class="add" href="taxe.php?id=<?= $taxe->id_taxe ?>"><i class="fas fa-shopping-basket"></i></a></td>

								</tr>

							<?php endforeach ?>

							</tbody>

						</table>
						</div>

</div>

</div>

<div class="col-4">

<div class="card card-primary card-outline">
  
<form action="insert.php" method="POST">

    <div class="card-header">

        <h4 class="card-title">Formulaire taxe</h4>

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
<dt>Nouvelles taxes</dt>
<dd>Pour ajouter une taxe  cliquer sur le menu taxe en haut,</dd>
<dd>ensuite renseigner le formulaire et cliquer sur le bouton ajouter</dd>
<dt>Modification</dt>
<dd>Pour modifier cliquer sur l'icône dans la colonne action</dd>
</dl>
</div>

</div>
    <div class="form-group">

        <label class="control-label">Type de taxe</label>
        <?
        if (isset($_GET['id'])){
        $reponse = $DB->query("SELECT * FROM bo_taxes 
        WHERE bo_taxes.id_taxe  =".$_GET['id']); 
        foreach ($reponse as $donne):?>
        <input type="hidden" name="id_taxe" class="form-control is-warning" id="inputWarning" value="<?= $_GET['id'] ?>">
        <input type="text" name="typetax" class="form-control is-warning" id="inputWarning" value="<?= $donne->type_tax ?>">
        <? endforeach; ?>
        <? } else { ?>  
        <input class="form-control" name="typetax" placeholder="type de taxe" type="text"/>
        <? } ?>

</div> 		
    

    <div class="form-group">

    <label class="control-label">Valeur taxe (%)</label>
    
	<?
             if (isset($_GET['id'])){?>
            <input type="text" name="valeurtax" class="form-control is-warning" id="inputWarning" value="<?= $donne->valeur_tax ?>"> 
            <? } else { ?> 
            <input class="form-control" name="valeurtax" placeholder="valeur" type="int"/>
            <? } ?>

    </div>
</div>     
                   
    </div>

    <div class="card-footer">

        <button type="submit" class="btn btn-success" name="valider_tx">Ajouter</button>
        <button type="submit" class="btn btn-warning" name="modifier_tx">Modifier</button>    
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