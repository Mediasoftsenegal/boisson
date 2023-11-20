<?php require '../page/header.php'; ?>



<!-- Content Header (Page header) -->



<div class="content-header">



    <div class="container-fluid">



        <div class="row mb-2">



            <div class="col-sm-6">



                <h1 class="m-0 text-dark">Tarifications</h1>



            </div><!-- /.col -->



            <div class="col-sm-6">



                <ol class="breadcrumb float-sm-right">



                    <li class="breadcrumb-item"><a href="tabbord.php">Accueil</a></li>



                    <li class="breadcrumb-item active">Tarification</li>



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



						<h3 class="card-title">Liste des tarifications</h3>

						

						<button style="float: right;" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">+ Tarification</button>



					</div>



					<!-- /.card-header -->

					<div class="card-body">

						<table id="example1" class="table table-bordered table-striped">

							<thead>

								<tr>

									<th>Client</th>

									<th>Actions</th>

								</tr>

							</thead>

							<tfoot>

								<tr>

									<th>Client</th>

									<th>Actions</th>

								</tr>

							</tfoot>

							<tbody>

							<?php $tarifs = $DB->query('SELECT * FROM ((bo_tarif INNER JOIN bo_client ON bo_tarif.id_client = bo_client.IDCLIENTS) INNER JOIN bo_Articles ON bo_tarif.id_article = bo_Articles.IDARTICLE) GROUP BY bo_tarif.id_client'); 

							//$tarifs = $DB->query("SELECT * FROM bo_tarif INNER JOIN bo_client ON bo_tarif.id_client = bo_client.IDCLIENTS GROUP BY bo_tarif.id_client");

							foreach ($tarifs as $tarif):?>

								<tr>

									<td><?= $tarif->NOMCLIENT ?></td>

									<td><a href="detail_tarif.php?id=<?= $tarif->id_client ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Modifier un produit" class="btn btn-icon btn-xs btn-outline-success"><i class="fa fa-book"></i></a>&nbsp;

									</td>

								</tr>

							<?php endforeach ?>

							</tbody>

						</table>

					</div>

				</div>

			</div>

			<div class="col-4">

				<div class="card card-primary card-outline">

					<form action="insert_tarif.php" method="POST">

						<div class="card-header">

							<h4 class="card-title">Formulaire tarification</h4>

						</div>

						<div class="card-body">

							<div class="form-group">

								<label>Nom client</label>

								<select class="form-control" id="select" name="client">

									<option>Choisir client</option>

									<? $clients = $DB->query('SELECT * FROM bo_client'); 

									foreach ($clients as $client):?>

									<option value="<?= $client->IDCLIENTS ?>"><?= $client->NOMCLIENT ?></option>

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

							<button type="submit" class="btn btn-warning" name="valider">Valider</button>

						</div>

					</form>

				</div>

			</div>

		</div>

	</div>

</section>

<?php require '../page/footer.php'; ?>