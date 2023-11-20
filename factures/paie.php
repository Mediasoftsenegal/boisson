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


                <h1 class="m-0 text-dark"><i class="fa-solid fa-file-invoice"> </i>&nbsp;&nbsp;Paiement acompte</h1>


            </div><!-- /.col -->


            <div class="col-sm-6">


                <ol class="breadcrumb float-sm-right">


                    <li class="breadcrumb-item"><a href="tabbord.php">Accueil</a></li>

                    <li class="breadcrumb-item active"><a href="acompte.php">Factures</a></li>

					<li class="breadcrumb-item active">Paiements</li>

                </ol>


            </div><!-- /.col -->


        </div><!-- /.row -->


    </div><!-- /.container-fluid -->

</div>

<section class="content">

	<div class="container-fluid">

		<div class="row">

			<div class="col-12">

				<div class="card card-dark card-outline">

					<div class="card-header">

						<h3 class="card-title">Paiments des factures</h3
						
					</div>
                    &nbsp;
					<!-- /.card-header -->
                    <div class="card-body">

                    <form action="modif.php" method="POST">

                        <div class="row">

                            <? $paies = $DB->query("SELECT Id_facture, Date_factures,num_facture, Montant_factures,Montant_paye,Etat_factures,bo_factures.Id_commande,bo_Commandes.id_client,bo_Commandes.Id_commande
                            FROM bo_factures,bo_Commandes
                            WHERE bo_factures.Id_commande=bo_Commandes.Id_commande
                            AND bo_factures.Etat_factures='NON PAYEE'
                            AND bo_factures.Id_facture = ".$_GET['id']); 

                            foreach ($paies as $paie) : ?>

                            <input type="hidden" name="id" value="<?= $_GET['id'] ?>" class="form-control">

                            <div class="col-6">

                                <div class="form-group">

                                    <label>Client</label>

                                    <input type="text" class="form-control" value="<?= idente($paie->id_client)?>" readonly>

                                </div>

                                <div class="form-group">

                                    <label>Montant Facture</label>

                                    <input type="text" name="montantfacture" class="form-control" value="<?= $paie->Montant_factures ?>" readonly>

                                </div>
                                <div class="form-group">

                                    <label>Date paiement</label>

                                    <input type="date" name="date_paie" class="form-control" value="<?= date('Y-m-d') ?>" readonly>

                                </div>

                                <div class="form-group">

                                    <label>Reste</label>

                                    <input type="text" class="form-control" value="<?= $paie->Montant_factures - $paie->Montant_paye ?>" name="reste" readonly>

                                </div>

                            </div>

                            <div class="col-6">

                                <div class="form-group">

                                    <label>Numéro Facture</label>

                                    <input type="text" name="numfacture" class="form-control" value="<?= $paie->num_facture ?>" readonly>

                                </div>

                                <div class="form-group">

                                    <label>Montant Payé</label>

                                    <input type="text"  name="montantpaye" class="form-control" value="<?= $paie->Montant_paye ?>" readonly>

                                </div>

                                <div class="form-group">

                                    <label>Acompte</label>

                                    <input type="number" name="acompte" class="form-control" required>

                                </div>

                            </div>

                            <? endforeach; ?>

                        </div>

                        <button type="submit" class="btn btn-success btn-sm">Valider</button>

                    </form>

                    </div>
					&nbsp;

                </div>

            </div>

        </div>

    </div>

</section>



<?php require '../page/footer.php'; ?>