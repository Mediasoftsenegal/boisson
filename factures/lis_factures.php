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



                <h1 class="m-0 text-dark"><i class="fa-solid fa-file-invoice"> </i>&nbsp;&nbsp;Factures</h1>



            </div><!-- /.col -->



            <div class="col-sm-6">



                <ol class="breadcrumb float-sm-right">



                    <li class="breadcrumb-item"><a href="tabbord.php">Accueil</a></li>



                    <li class="breadcrumb-item active">Factures</li>

					<li class="breadcrumb-item active"><a href="acompte.php">Paiements</a></li>

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



						<h3 class="card-title">Liste des factures</h3>

						
					</div>



					<!-- /.card-header -->

					<div class="card-body">

						<table id="example1" class="table table-bordered table-striped">

							<thead>

								<tr>
									<th></th>

									<th>Date </th>

									<th>Client</th>

									<th>Montant</th>

									<th>Etat</th>

									<th>Imprimer</th>
									
									<th>Editer</th>

								</tr>

							</thead>

							<tfoot>

								<tr>
									<th></th>

									<th>Date </th>

									<th>Client</th>

									<th>Montant</th>

									<th>Etat</th>

									<th>Imprimer</th>

									<th>Editer</th>

								</tr>

							</tfoot>

							<tbody>

							<?php $factures = $DB->query('SELECT Id_facture, Date_factures,num_facture, Montant_factures,Etat_factures,bo_factures.Id_commande,bo_Commandes.id_client,bo_Commandes.Id_commande
                            FROM bo_factures,bo_Commandes
                            WHERE bo_factures.Id_commande=bo_Commandes.Id_commande
                            order by Id_facture DESC'); 

							foreach ($factures as $facture):
								$datefact=explode('-',$facture->Date_factures);?>
								<tr>
								<td><?= $facture->Id_facture ?></td>

									<td><?=$datefact[2].'/'.$datefact[1].'/'.$datefact[0]?></td>

									<td><?= idente($facture->id_client) ?></td>

									<td align="right"><?= number_format($facture->Montant_factures,0,","," ") ?> F CFA</td>

									<td><?= $facture->Etat_factures ?></td>
									
									<td align="center"><a href="fact.php?id=<?= $facture->Id_commande ?>" target="_blank" data-toggle="tooltip" data-placement="right" title="" data-original-title="Modifier une facture" class="btn btn-icon btn-xs btn-outline-dark"><i class="fa fa-file-pdf"></i></a>&nbsp;

									</td>

									<td align="center" ><a class="add" href="invoice.php?id=<?= $facture->Id_facture ?>" target="_blank"><i class="fas fa-shopping-basket"></i></a></td>

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