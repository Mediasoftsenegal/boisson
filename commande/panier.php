<?php require '../page/header.php'; ?>
<?php
echo 'Valeur ='.$_GET['del'];
if (isset($_GET['del'])) {
    $DB->query("DELETE FROM bo_panier WHERE id_article = ".$_GET['del']." AND id_user = ".$_SESSION['id']);
} ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Validation Commande</h1>
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
									<h3 class="card-title">Validation Commande</h3>
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
							<tfoot>
								<tr>
									<th>Articles</th>
									<th>Prix d'achat</th>
									<th>Quantité</th>
									<th>Prix Total</th>
									<th>Actions</th>
								</tr>
							</tfoot>
							<tbody>
                            <?php 
                                $products = $DB->query('SELECT * FROM bo_panier p, bo_Articles a, bo_tarif t WHERE p.id_article = a.IDARTICLE AND p.id_article = t.id_article AND p.id_user = '.$_SESSION["id"] .' GROUP BY p.id_article');
                                foreach ( $products as $product): ?>
                                    <input type="hidden" name="id_article[]" value="<?= $product->IDARTICLE ?>">
                                <tr>
                                    <td><input type="text" name="des[]" class="form-control" value="<?= $product->LIBARTICLE ?>" readonly></td>
                                    <td><input type="number" name="price[]" class="form-control price" value="<?= $product->montant ?>" readonly></td>
                                    <td><input type="number" name="qty[]" class="form-control qty" value="1"></td>
                                    <td><input type="number" name="subtot[]" class="form-control subtot" value="<?= $product->montant * 1 ?>" readonly></td>
                                    <td><a href="panier.php?del=<?=$product->id_article ?>&cl=<?= $_GET['cl'] ?>"><i class="fa fa-trash"></i></a></td>                                
                                </tr>
                            <?php endforeach ?>
                                <tr>
                                    <td colspan="2">Total</td>
                                    <td><input type="number" id="totqty" name="totqty" class="form-control" value="<?= $panier->count(); ?>" readonly></td>
                                    <td><input type="float" id="total" name="total" class="form-control" value="<?= $panier->total(); ?>" readonly></td>
                                </tr>
                            </tbody>
						</table>
                        <input type="hidden" name="id_client" value="<?= $_GET['cl'] ?>">
                        <input type="hidden" name="id_user" value="<?= $_SESSION['id'] ?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var qtys = document.getElementsByClassName("qty");
    var subtots = document.getElementsByClassName("subtot");
    var prices = document.getElementsByClassName("price");
    var totqty = document.getElementById("totqty");
    var total = document.getElementById("total");
    for(let i = 0; i < qtys.length; i++){
        var qty = qtys[i];
        qty.addEventListener("change", evt=>{
            subtots[i].value = prices[i].value * evt.target.value;
            var tqt = 0;
            var tot = 0;
            for(let j = 0; j < qtys.length; j++){
                var qt = qtys[j];
                tot = parseFloat(subtots[j].value) + tot;
                tqt = parseFloat(qt.value) + tqt;
            }
            totqty.value = tqt;
            total.value = tot;
        });
    }
</script>
<?php require '../page/footer.php'; ?>