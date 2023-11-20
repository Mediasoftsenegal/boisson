<?php require '../page/header.php'; ?>

<!-- Content Header (Page header) -->

<div class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h1 class="m-0 text-dark">Sortie de stock</h1>

            </div><!-- /.col -->

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                    <li class="breadcrumb-item active">sortie stock </li>
                    <li class="breadcrumb-item active"><a href="etat_stock.php">Etat du stock</a></li>
                    <li class="breadcrumb-item active"><a href="histo.php">Historiques </a></li>

                </ol>

            </div><!-- /.col -->

        </div><!-- /.row -->

    </div><!-- /.container-fluid -->

</div>
<!-- Main content -->



<section class="content">

	<div class="container-fluid">

		<div class="row">

			<div class="col-8">



				<div class="card card-primary card-outline">



					<div class="card-header">



						<h3 class="card-title">Sortie de stock</h3>

					</div>



					<!-- /.card-header -->

					<div class="card-body">

						<table id="example1" class="table table-bordered table-striped">

							<thead>

								<tr>
									
									<th>Date sortie</th>
									<th>Article</th>
									<th>Conditionnement</th>                                    
                                    <th>Quantité (Bts) </th>
                                    <th>Motif</th>
									<th>Auteur</th>
									<th>Actions</th>

								</tr>

							</thead>

							<tfoot>

								<tr>
									<th>Date inventaire</th>
									<th>Article</th>
									<th>Conditionnement</th>
                                    <th>Quantité (Bts) </th>
                                    <th>Motif</th>
									<th>Auteur</th>
									<th>Actions</th>
								</tr>

							</tfoot>

							<tbody>

							<?php $sortiest = $DB->query('SELECT bo_sortiestock.Date_sortie, bo_Article_.LIBARTICLE ,bo_Article_.CONDITIONNEMENT, bo_sortiestock.quantite , bo_sortiestock.motif
								FROM bo_sortiestock, bo_Article_
								where bo_sortiestock.IDARTICLE= bo_Article_.IDARTICLE 
								ORDER BY Date_sortie DESC' ); 

                            foreach ($sortiest as $sorttock):?>

								<tr>
									<? $nb= $sorttock->quantité_decompte ?>
									<? //echo 'nombre : '.$nb ?>
									<? $nc=$sorttock->CONDITIONNEMENT?>
								
									<? $dater = $sorttock->Date_sortie ?>
									<? $date = explode('-',$dater) ?>
									<td><?= $date[2].'-'. $date[1].'-'.$date[0]?></td>	
                                    <td><?= $sorttock->LIBARTICLE ?></td>
									<td><?= $sorttock->CONDITIONNEMENT ?></td>
                                    <td><?= $sorttock->quantite ?></td>
									<td><?= $sorttock->motif ?></td>
									<td><? echo $_SESSION['utilisateur']?></td>
									
									<td align="center"><a class="add" href="modif.php?add=<?= $sorttock->IDARTICLE ?>&idf=<?= $sorttock->IDARTICLE ?>"><i class="fas fa-shopping-basket"></i></a></td>
								</tr>

							<?php endforeach ?>

							</tbody>

						</table>

					</div>

				</div>

			</div>

			<div class="col-4">

				<div class="card card-primary card-outline">

					<form action="insert_sortie.php" method="POST">

						<div class="card-header">

							<h4 class="card-title">Formulaire de sortie de stock</h4>

						</div>

						<div class="card-body">
						<div class="form-group">

								<label class="control-label">Date sortie</label>

								<input class="form-control" name="date_sortie" placeholder="Date " type="date"/>

							</div>			
						

						<div class="form-group">

						<label class="control-label">Produit</label>

						<select name="id_produit" class="form-control select">

							<option>Choisir Produit</option>

							<? $products = $DB->query('SELECT * FROM bo_Articles'); 

							foreach ($products as $product):?>

							<option value="<?= $product->IDARTICLE ?>"><?= $product->LIBARTICLE ?></option>

							<? endforeach; ?>

						</select>

						</div>
                        <div class="form-group">   
                        <label class="control-label">Motif</label>   
                        <select name="motif" class="form-control select">
                            <option value="Cassée">Cassée</option>
                            <option value="Volée">Volée</option>
                            <option value="Offerte">Offert</option>
                            <option value="Périmée">Périmée</option>
                        </select>
                        </div>
							<div class="form-group">

								<label class="control-label">Quantité </label>

								<input class="form-control" name="quantitesortie" placeholder="Quantité " type="int"/>

							</div>

						</div>

						<div class="card-footer">

							<button type="submit" class="btn btn-warning" name="validersortie">Valider</button>

						</div>

					</form>

				</div>

			</div>

		</div>

	</div>

</section>

<?php require '../page/footer.php'; ?>