<?php require '../page/header.php'; ?>

<div class="content-header">
<?
function idente($idcli){
        $pdo = new PDO('mysql:host=localhost;dbname=remacons_wp101;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');

        $clie =$pdo->query('SELECT * FROM bo_client where IDCLIENTS='.$idcli); 
           
        foreach ($clie as $row) {

        $nomcli = $row['NOMCLIENT'];

        return $nomcli ;
       
        }
    }
    ?>


    <div class="container-fluid">



        <div class="row mb-2">



            <div class="col-sm-6">



                <h1 class="m-0 text-dark"><i class="fa-solid fa-indent"> </i>&nbsp;&nbsp;Commandes</h1>



            </div><!-- /.col -->



            <div class="col-sm-6">



                <ol class="breadcrumb float-sm-right">



                    <li class="breadcrumb-item"><a href="tabbord.php">Accueil</a></li>



                    <li class="breadcrumb-item active">Commandes</li>



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



						<h3 class="card-title">Liste des commandes</h3>

						

						<button style="float: right;" type="button" class="btn btn-success"><a href="client.php" style="color: white;">+ Commande</a></button>



					</div>



					<!-- /.card-header -->

					<div class="card-body">

						<table id="example1" class="table table-bordered table-striped">

							<thead>

								<tr>
									<th></th>

									<th>Date Commande</th>

									<th>N° BC</th>

									<th>Client</th>

									<th>Montant</th>

									<th>Etat</th>

									<th>Actions</th>
									
									<th>imprimer</th>

								</tr>

							</thead>

							<tfoot>

								<tr>
									<th></th>

									<th>Date Commande</th>

									<th>N° BC</th>

									<th>Client</th>

									<th>Montant</th>

									<th>Etat</th>

									<th>Action</th>

									<th>imprimer</th>

								</tr>

							</tfoot>

							<tbody>

							<?php $commandes = $DB->query('SELECT * FROM bo_Commandes order by Id_commande DESC'); 

							foreach ($commandes as $commande):
								$datecom=explode('-',$commande->Date_commande);?>
								<tr>
								<td><?= $commande->Id_commande ?></td>

									<td><?=$datecom[2].'/'.$datecom[1].'/'.$datecom[0]?></td>

									<td><?= $commande->num_fac ?></td>

									<td><?= idente($commande->id_client) ?></td>

									<td align="right"><?= number_format($commande->Montant_commande,0,","," ") ?></td>

									<td><?= $commande->Etat_commande ?></td>

									<td><a class="add" href="detail_comm.php?id=<?= $commande->Id_commande ?>" target="_blank"><i class="fas fa-shopping-basket"></i></a></td>
									
									<td><a href="fact.php?id=<?= $commande->Id_commande ?>" target="_blank" data-toggle="tooltip" data-placement="right" title="" data-original-title="Modifier un produit" class="btn btn-icon btn-xs btn-outline-dark"><i class="fa fa-file-pdf"></i></a>&nbsp;

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