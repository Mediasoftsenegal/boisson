<?php require '../page/header.php'; ?>

<!-- Content Header (Page header) -->

<div class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h1 class="m-0 text-dark">Clients</h1>

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
			<div class="col-12">

				<div class="card card-primary card-outline">

					<div class="card-header">

						<h3 class="card-title">Liste des clients</h3>

					</div>

					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Code client</th>
									<th>Nom Client</th>
									<th>Choisir</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Code client</th>
									<th>Nom Client</th>
									<th>Choisir</th>
								</tr>
							</tfoot>
							<tbody>
							<?php $clients = $DB->query('SELECT * FROM bo_client'); 
							foreach ($clients as $client):?>
								<tr>
									<td><?= $client->CODECLIENT ?></td>
									<td><?= $client->NOMCLIENT ?></td>
									<td align="center"><a class="add" href="produit.php?id=<?= $client->IDCLIENTS ?>"><i class="fas fa-shopping-basket"></i></a></td>
								</tr>
							<?php endforeach ?>
							<?php $nbrcom = $DB->query('SELECT *count(*) as nbre FROM bo_Commandes'); 
							foreach ($nbrcom as $nbrd):
									$_SESSION['cpt']=$nbrd->nbre;
							 endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php require '../page/footer.php'; ?>