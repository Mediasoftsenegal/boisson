<?php require '../page/header.php'; ?>

<div class="content-header">



    <div class="container-fluid">



        <div class="row mb-2">



            <div class="col-sm-6">



                <h1 class="m-0 text-dark"><i class="fa-solid fa-truck-field"> </i>&nbsp;&nbsp;Approvisionnement</h1>



            </div><!-- /.col -->



            <div class="col-sm-6">



                <ol class="breadcrumb float-sm-right">



                    <li class="breadcrumb-item"><a href="tabbord.php">Accueil</a></li>



                    <li class="breadcrumb-item active">Approvisionnement</li>



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

			<div class="col-12">



				<div class="card card-dark card-outline">



					<div class="card-header">



						<h3 class="card-title">Liste des approvisionnements</h3>

						

						<a href="fourni_panier.php" style="color: white;"><button style="float: right;" type="button" class="btn btn-success">+ Approvisionnement</button></a>



					</div>



					<!-- /.card-header -->

					<div class="card-body">

						<table id="example1" class="table table-bordered table-striped">

							<thead>

								<tr>

									<th>Date Approvisionnement</th>

									<th>Fournisseur</th>

									<th>Montant</th>

									<th>Editer</th>

									<th>Actions</th>

								</tr>

							</thead>

							<tfoot>

								<tr>

									<th>Date Approvisionnement</th>

									<th>Fournisseur</th>

									<th>Montant</th>

									<th>Editer</th>

									<th>Imprimer</th>

								</tr>

							</tfoot>

							<tbody>

							<?php $appros = $DB->query('SELECT * FROM bo_appro INNER JOIN bo_Fournisseur ON bo_appro.id_fournisseur = bo_Fournisseur.IDFOURNISSEURS ORDER BY date_appro DESC'); 

							foreach ($appros as $appro):

							$date = explode("-",$appro->date_appro);?>

								<tr>

									<td><?= $date[2].'/'.$date[1].'/'.$date[0] ?></td>

									<td><?= $appro->NOMFOURNISSEUR ?></td>

									<td><?= number_format($appro->montant,2,","," ") ?></td>

									<td><a class="add" href="detail_appro.php?id=<?= $appro->id_appro ?>"><i class="fas fa-shopping-basket"></i></a></td>

									<td>

                                        <a href="facture.php?id=<?= $appro->id_appro ?>" data-toggle="tooltip" data-placement="center" title="" data-original-title="Modifier un produit" class="btn btn-icon btn-xs btn-outline-dark"><i class="fa fa-file-pdf"></i></a>&nbsp;

									    <!--a href="form_produit.php?id=<? ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="supprimer un produit" class="btn btn-icon btn-xs btn-outline-danger"><i class="fa fa-trash"></i></a-->

									</td>

								</tr>

							<?php endforeach ?>

							</tbody>

						</table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<?php require '../page/footer.php'; ?>