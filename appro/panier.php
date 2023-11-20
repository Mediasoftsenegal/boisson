<?php require '../page/header.php'; ?>
<? if (isset($_GET['del'])) {
    $panier->del($_GET['del']);
} ?>
<div class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h1 class="m-0 text-dark">Validation Approvisionnement</h1>

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

                        <div class="row">
							<div class="col-12 col-sm-6 col-md-3">
								<div class="info-box">
									<h3 class="card-title">Validation Approvisionnement</h3>
								</div>
							</div>


							<div class="col-12 col-sm-6 col-md-3">
								<div>
									<p>Etape 3 sur 3</p>
									<div class="progress progress-sm">
										<div class="progress-bar bg-primary" style="width: 100%"></div>
									</div>
								</div>
							</div>

							<div class="col-12 col-sm-6 col-md-3">
                                <button style="float: right;" class="btn btn-secondary" onclick="history.back()">Retour au panier</button>
							</div>
                            
                        <form action="valid.php" method="GET">
							<div class="col-12 col-sm-6 col-md-3">
                                <button style="margin-left: 200px;" type="submit" class="btn btn-warning">Valider</button>
							</div>

						</div>

					</div>

					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Articles</th>
									<th>Prix d'achat</th>
									<th>Quantité</th>
									<th>Prix Total</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
                            <?php 
                                $ids = array_keys($_SESSION['panier']);
                                $id = implode(",",$ids);
                                //echo $id;
                                if(empty($ids)){
                                    $products = array();
                                }else{
                                    $products = $DB->query('SELECT * FROM bo_Articles WHERE IDARTICLE IN ('.implode(',',$ids).')');
                                    $prods = $DB->query("SELECT * FROM bo_Articles WHERE LIBELLEGROUPE = 'BS' AND IDARTICLE IN (".implode(',',$ids).")");
                                }
                                //$a = 11299.4 + 12372.869999999999;
                                foreach ( $products as $product): ?>
                                <tr>
                                    <td><input type="text" name="des[]" class="form-control" value="<?= $product->LIBARTICLE ?>" readonly></td>
                                    <td><input type="float" name="price[]" class="form-control price" value="<?= $product->PRIXACHATLIQUIDE ?>" readonly></td>
                                    <td><input type="number" name="qty[]" class="form-control qty Q<?= $product->LIBELLEGROUPE ?>" value="<?= $_SESSION['panier'][$product->IDARTICLE] ?>"></td>
                                    <td><input type="float" name="subtot[]" class="form-control subtot" value="<?= $product->PRIXACHATLIQUIDE * $_SESSION['panier'][$product->IDARTICLE] ?>" readonly></td>
                                    <input type="hidden" class="<?= $product->LIBELLEGROUPE ?>" value="<?= $product->PRIXACHATLIQUIDE * $_SESSION['panier'][$product->IDARTICLE] ?>" readonly>
                                    <td><a href="panier.php?del=<?= $product->IDARTICLE ?>" class="del"><i class="fa fa-trash"></i></a></td>
                                </tr>
                            <?php endforeach ?>
                                <tr>
                                    <td colspan="2">Total</td>
                                    <td><input type="number" id="totqty" name="totqty" class="form-control" value="<?= $panier->count(); ?>" readonly></td>
                                    <td><input type="float" id="total" name="total" class="form-control" value="<?= $panier->total(); ?>" readonly></td>
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
                                    <td><input type="float" id="tbas" class="form-control" value="<?= $panier->subtotba() ?>" readonly></td>
                                    <td><input type="text" value="50%" class="form-control" readonly></td>
                                    <td><input type="float" id="tba" class="form-control" value="<?= $panier->subtotba()*50/100 ?>" readonly></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>TIGB</td>
                                    <td><input type="float" id="tibgs" class="form-control" value="<?= $panier->subtotbs() ?>" readonly></td>
                                    <td><input type="text" value="5%" class="form-control" readonly></td>
                                    <td><input type="float" id="tibg" class="form-control" value="<?= $panier->subtotbs()*5/100 ?>" readonly></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>TVA</td>
                                    <td><input type="float" id="totale" class="form-control" value="<?= $panier->total() ?>" readonly></td>
                                    <td><input type="text" value="18%" class="form-control" readonly></td>
                                    <td><input type="float" id="tva" class="form-control" value="<?= ($panier->total()+($panier->subtotba()*50/100)+($panier->subtotbs()*5/100))*18/100 ?>" readonly></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3">Total Approvisionnement</td>>
                                    <td><input type="float" id="tout" class="form-control" value="<?= ($panier->subtotba()+($panier->subtotba()*50/100)) + (($panier->total()+($panier->subtotba()+($panier->subtotba()*50/100))+($panier->subtotbs()+($panier->subtotbs()*5/100)))*18/100) + ($panier->subtotbs()+($panier->subtotbs()*5/100)) + $panier->total() ?>" readonly></td>
                                    <td></td>
                                </tr>
                            </tbody>
						</table>                        
                        <input type="hidden" name="id_article" value="<?= $id ?>">
                        <input type="hidden" name="id_client" value="<?= $_SESSION['id'] ?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var qbas = document.getElementsByClassName("QBA");
    var qbss = document.getElementsByClassName("QBS");
    var qtys = document.getElementsByClassName("qty");
    var subtots = document.getElementsByClassName("subtot");
    var prices = document.getElementsByClassName("price");
    var ba = document.getElementsByClassName("BA");
    var bs = document.getElementsByClassName("BS");
    var totqty = document.getElementById("totqty");
    var total = document.getElementById("total");
    var totale = document.getElementById("totale");
    var tba = document.getElementById("tba");
    var tibg = document.getElementById("tibg");
    var tva = document.getElementById("tva");
    var tbas = document.getElementById("tbas");
    var tibgs = document.getElementById("tibgs");
    var tout = document.getElementById("tout");
    var t = 0;
    var vtvas = 0;
    var vtbass = 0;
    var vtibgss = 0;
    var totas = 0;
    for(let i = 0; i < qtys.length; i++){
        var qty = qtys[i];
        qty.addEventListener("change", evt=>{
            subtots[i].value = prices[i].value * evt.target.value;
            var tqt = 0;
            var tot = 0;
            //var tota = 0;
            for(let j = 0; j < qtys.length; j++){
                var qt = qtys[j];
                tot = parseFloat(subtots[j].value) + tot;
                tqt = parseFloat(qt.value) + tqt;
                //tota = parseFloat(subtots[j].value) + tota;
                //vtva = tota * 18 / 100;
            }
            totqty.value = tqt;
            total.value = tot;
            //totale.value = tota;
            //tva.value = vtva;
        });
    }
    for (let l = 0; l < qbas.length; l++) {
        const qba = qbas[l];
        qba.addEventListener("change", (event)=>{
            ba[l].value = prices[l].value * event.target.value;
            var vtbas = 0;
            var vtba = 0;
            for (let n = 0; n < qbas.length; n++) {
                const qa = qbas[n];
                vtbas = parseFloat(ba[n].value) + vtbas;
                vtba = vtbas * 50 / 100;
            }
            tbas.value = vtbas;
            tba.value = vtba;
        });
    }
    for (let k = 0; k < qbss.length; k++) {
        const qbs = qbss[k];
        qbs.addEventListener("change", (event)=>{
            bs[k].value = prices[k].value * event.target.value;
            var vtibgs = 0;
            var vtibg = 0;
            for (let m = 0; m < qbss.length; m++) {
                const qs = qbss[m];
                vtibgs = parseFloat(bs[m].value) + vtibgs;
                vtibg = vtibgs * 5 / 100;
            }
            tibgs.value = vtibgs;
            tibg.value = vtibg;
        });
    }
    console.log(total.value);
    console.log(tba.value);
    console.log(tibg.value);
    for (let index = 0; index < qtys.length; index++) {
        var q = qtys[index];
        var vtva = 0;
        q.addEventListener("change", evt => {
            vtva = (parseFloat(total.value) + parseFloat(tba.value) + parseFloat(tibg.value)) * 18 / 100;
            t = vtva + parseFloat(total.value) + parseFloat(tba.value) + parseFloat(tibg.value);
            totale.value = parseFloat(total.value) + parseFloat(tba.value) + parseFloat(tibg.value);
            tva.value = vtva;
            tout.value = t;
        });
    }
</script>
<?php require '../page/footer.php'; ?>