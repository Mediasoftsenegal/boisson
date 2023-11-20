<?php require 'header.php'; ?>
<!-- Content Header (Page header) -->



<div class="content-header">



    <div class="container-fluid">



        <div class="row mb-2">



            <div class="col-sm-6">



                <h1 class="m-0 text-dark"><i class="fas fa-layer-group"> </i>&nbsp;&nbsp;Inventaire du dépôt </h1>



            </div><!-- /.col -->



            <div class="col-sm-6">



                <ol class="breadcrumb float-sm-right">



                    <li class="breadcrumb-item"><a href="tabbord.php">Accueil</a></li>



                    <li class="breadcrumb-item active">Inventaire</li>



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
						<h3 class="card-title">Historiques des inventaires par ordre décroissant</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">

							<thead>
								<tr>
									<th>Date inventaire</th>
									<th>Article</th>
									<th>Conditionnement</th>                                    
                                    <th>Quantité en bouteille </th>
									<th>Nombre de casiers</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Date inventaire</th>
									<th>Article</th>
									<th>Conditionnement</th>
                                    <th>Quantité en bouteille </th>
									<th>Nombre de casiers</th>
									<th>Actions</th>
								</tr>
							</tfoot>

							<tbody>

							<?php $invnt = $DB->query('SELECT bo_inventaire.Date_inventaire, bo_Articles.LIBARTICLE ,bo_Articles.CONDITIONNEMENT, bo_inventaire.quantité_decompte 
								FROM bo_inventaire, bo_Articles
								where bo_inventaire.IDARTICLE= bo_Articles.IDARTICLE 
								ORDER BY Date_inventaire DESC' ); 

                            foreach ($invnt as $invent):?>

								<tr>
									<? $nb= $invent->quantité_decompte ?>
									<? //echo 'nombre : '.$nb ?>
									<? $nc=$invent->CONDITIONNEMENT?>
									<? $rest = substr($nc, -2, 2) ?>
									<? $dater = $invent->Date_inventaire ?>
									<? $date = explode('-',$dater) ?>
									<td><?= $date[2].'-'. $date[1].'-'.$date[0]?></td>	
                                    <td><?= $invent->LIBARTICLE ?></td>
									<td><?= $invent->CONDITIONNEMENT ?></td>
                                    <td><?= $invent->quantité_decompte ?></td>
									<? $total= $nb / $rest?>
									<td><? echo number_format($total, 0, ',', ' ');?></td>
									
									<td align="center"><a class="add" href="modif.php?add=<?= $invent->IDARTICLE ?>&idf=<?= $invent->IDARTICLE ?>"><i class="fas fa-shopping-basket"></i></a></td>
								</tr>

							<?php endforeach ?>

							</tbody>

						</table>

					</div>

				</div>

			</div>

			<div class="col-4">

				<div class="card card-primary card-outline">

					<form action="insert_invent.php" method="POST">

						<div class="card-header">

							<h4 class="card-title">Formulaire de saisie de l'inventaire</h4>

						</div>

						<div class="card-body">
						<div class="form-group">

								<label class="control-label">Date inventaire</label>

								<input class="form-control" name="date_invent" placeholder="Date inventaire"   type="date" required>

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

								<label class="control-label">Quantité décomptée en bouteille </label>

								<input class="form-control" name="quantinv" placeholder="Quantité décomptée" type="int" required>

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