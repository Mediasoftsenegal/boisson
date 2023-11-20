<?php require '../page/header.php'; ?>

<?
function ident($idart){
        $pdo = new PDO('mysql:host=localhost;dbname=remacons_wp101;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');

        $artic =$pdo->query('SELECT * FROM bo_Articles where IDARTICLE='.$idart); 
           
        foreach ($artic as $row) {

        $libart = $row['LIBELLEGROUPE'].' - '.$row['LIBARTICLE'] ;

        return $libart ;
       
        }
    }
    ?>
<div class="content-header">
   
    <div class="container-fluid">



        <div class="row mb-2">



            <div class="col-sm-6">



            <h1 class="m-0 text-dark"><i class="fa-solid fa-truck-field"> </i>&nbsp;&nbsp;Approvisionnement</h1>



            </div><!-- /.col -->



            <div class="col-sm-6">



                <ol class="breadcrumb float-sm-right">



                    <li class="breadcrumb-item"><a href="tabbord.php">Accueil</a></li>

                    <li class="breadcrumb-item active"><a href="appro.php">Approvisionnement</a></li>

                    <li class="breadcrumb-item active">Détail


                </ol>



            </div><!-- /.col -->



        </div><!-- /.row -->



    </div><!-- /.container-fluid -->



</div>



<!-- /.content-header -->



<!-- Main content -->


<?php $appros = $DB->query('SELECT * FROM bo_appro INNER JOIN bo_Fournisseur ON bo_appro.id_fournisseur = bo_Fournisseur.IDFOURNISSEURS WHERE id_appro ='.$_GET['id']); 

foreach ($appros as $appro):

$date = explode("-",$appro->date_appro);?>

<section class="content">

	<div class="container-fluid">

		<div class="row">

			<div class="col-12">

				<div class="card card-dark card-outline">

					<div class="card-header">
                    <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title">Approvisionnement</h3>
                    </div>
                    <div class="card-body">
                    <div class="row">
                    <div class="col-3">
                    <input type="text" class="form-control" placeholder="<?= $date[2].'/'.$date[1].'/'.$date[0] ?>">
                    </div>
                    <div class="col-5">
                    <input type="text" class="form-control" placeholder="<?= $appro->NOMFOURNISSEUR ?>">
                    </div>
                    <div class="col-3">
                    <input type="text" align ="right" class="form-control" placeholder="<?= number_format($appro->montant,2,","," ") ?>">
                    </div>
                    </div>
                    </div>

                    </div>

					</div>
                    <?php endforeach ?>
                    

					<!-- /.card-header -->

					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">

							<thead>

								<tr>

									<th>Article</th>

									<th>Prix unitaire</th>

									<th>Quantité</th>
                                
									<th>Montant</th>

								</tr>

							</thead>

							
							<tbody>

							<?php $appros = $DB->query('SELECT id_article,prix_unitaire,quantite FROM bo_ligne_appro WHERE id_appro='.$_GET['id']); 
                            
							foreach ($appros as $appro): 

							$id_article_app= explode(",",$appro->id_article);
                            $prix_app= explode(",",$appro->prix_unitaire);
                            $qte= explode(",",$appro->quantite);

                            endforeach ?>
                            <tr>
                            <? for ($x=0; $x<count($id_article_app);$x++) {?>
                            <td><?= ident($id_article_app[$x]) ?></td>
                            
                            <td><?=$prix_app[$x]?></td>
                            
                            <td><?= $qte[$x]?></td>
                           
                            <? $somme += $prix_app[$x]*$qte[$x]?>
                            
                            <? $tr=ident($id_article_app[$x]);
                            
                            $gch=explode(' - ',$tr);
                            
                            if($gch[0]=="BS"){
                                $sommeBS+= $prix_app[$x]*$qte[$x];
                            };
                            if($gch[0]=="BA"){
                                $sommeBA+= $prix_app[$x]*$qte[$x];
                            };
                            
                            ?>
                            <td align="center"><?=number_format($prix_app[$x]*$qte[$x],2,","," ")?></td>

                            <td>

                             
                            </td>

                            </tr>                          
                            
                            <? } ?>
                            <tr>

                            <td colspan="2">Total</td>

                            <td><input type="number" id="totqty" name="totqty" class="form-control is-invalid" value="<? echo array_sum($qte); ?>" readonly></td>

                            <td><input type="float" id="total" name="total" class="form-control is-valid" value="<?=number_format($somme,2,","," ") ?>" readonly></td>

                            <td></td>

                            </tr>

                            <tr>

                            <td>Taxes</td>

                            <td>Prix</td>

                            <td>Valeur taxe</td>

                            <td>Prix taxe</td>

                            <td></td>

                            </tr>

                            <tr>

                            <td>TBA</td>

                            <td><input type="float" id="tbas" class="form-control" value="<?= number_format($sommeBA,2,","," ")  ?>" readonly></td>

                            <td><input type="text" value="50%" class="form-control" readonly></td>

                            <td><input type="float" id="tba" class="form-control" value="<?= number_format($sommeBA*50/100,2,","," ")  ?>" readonly></td>

                            <td></td>

                            </tr>

                            <tr>

                            <td>TIGB</td>

                            <td><input type="float" id="tibgs" class="form-control" value="<?=number_format($sommeBS,2,","," ")  ?>" readonly></td>

                            <td><input type="text" value="5%" class="form-control" readonly></td>

                            <td><input type="float" id="tibg" class="form-control" value="<?=number_format($sommeBS*5/100,2,","," ")  ?>" readonly></td>

                            <td></td>

                            </tr>

                            <tr>

                            <td>TVA</td>

                            <td><input type="float" id="totale" class="form-control" value="<?= number_format($somme+($sommeBA*50/100)+($sommeBS*5/100),2,","," ")  ?>" readonly></td>

                            <td><input type="text" value="18%" class="form-control" readonly></td>
                            <? $tba=$sommeBA*50/100; $tigb=$sommeBS*5/100;
                             $somtx=$tba+$tigb;?>
                            <td><input type="float" id="tva" class="form-control" value="<?=number_format(($somme+($sommeBA*50/100)+($sommeBS*5/100))*18/100,2,","," ")  ?>" readonly></td>
                            <? $tva=($somme+($sommeBA*50/100)+($sommeBS*5/100))*18/100;?>
                            <td></td>

                            </tr>

                            <tr>

                            <td colspan="3">Total Approvisionnement</td>

                            <td><input type="float" id="tout" class="form-control" value="<?= number_format($somtx + $tva+$somme,2,","," ")  ?>" readonly></td>

                            <td></td>

                            </tr>
							</tbody>

						</table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<?php require '../page/footer.php'; ?>