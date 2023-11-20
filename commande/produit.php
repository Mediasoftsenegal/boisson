		<?php require '../page/header.php';

require_once 'panier.class.php';

$p = new paniers($DB); 

$id_client = $_GET['id']; ?>

<div class="content-header">



    <div class="container-fluid">



        <div class="row mb-2">



            <div class="col-sm-6">



                <h1 class="m-0 text-dark">Produits</h1>



            </div><!-- /.col -->



            <div class="col-sm-6">



                <ol class="breadcrumb float-sm-right">



                    <li class="breadcrumb-item"><a href="tabbord.php">Accueil</a></li>



                    <li class="breadcrumb-item active">Commande</li>



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



						<div class="row">

							<div class="col-12 col-sm-6 col-md-3">

								<div class="info-box">

									<h3 class="card-title">Sélectionner des produits</h3>

								</div>

							</div>





							<div class="col-12 col-sm-6 col-md-3">

								<div>

									<p>Etape 2 sur 3</p>

									<div class="progress progress-sm">

										<div class="progress-bar bg-primary" style="width: 66%"></div>

									</div>

								</div>

							</div>



							<div class="col-12 col-sm-6 col-md-3">

								<div class="info-box">

									<h3 class="card-title" style="color: red;">Produits séléctionnés : <?= $p->count($_SESSION["id"]) ?></h3>

								</div>

							</div>



							<div class="col-12 col-sm-6 col-md-3">

								<div class="info-box">

									<a href="panier.php?cl=<?= $_GET['id'] ?>" style="color: white;"><button style="float: right;" class="btn btn-dark">Consulter ></button></a>

								</div>

							</div>



						</div>

						<!--div class="row">

							<div class="col-md-3"></div>

							<div class="col-md-3">

								<div class="progress progress-sm">

									<div class="progress-bar bg-primary" style="width: 66%"></div>

								</div>

							</div>

						</div-->



					</div>



					<!-- /.card-header -->

					<div class="card-body">

						<table id="example1" class="table table-bordered table-striped">

							<thead>

								<tr>

									<th>Articles</th>

									<th>Prix d'achat</th>

									<th>Actions</th>

								</tr>

							</thead>

							<tfoot>

								<tr>

									<th>Articles</th>

									<th>Prix d'achat</th>

									<th>Actions</th>

								</tr>

							</tfoot>

							<tbody>

							<?php //$_SESSION['id'] = $_GET['id'];

							$id = $_GET['id']; //echo $id;

							$produits = $DB->query("SELECT * FROM bo_tarif INNER JOIN bo_Articles ON bo_tarif.id_article = bo_Articles.IDARTICLE WHERE id_client = $id_client"); 

							foreach ($produits as $produit):?>

								<tr>

									<td><?= $produit->LIBARTICLE ?></td>

									<td><?= $produit->montant ?></td>

									<td><a class="add" href="addpanierf.php?add=<?= $produit->IDARTICLE ?>&idf=<?= $id ?>"><i class="fas fa-shopping-basket"></i></a></td>

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