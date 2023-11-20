<?php require '../page/header.php'; ?>
<div class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h1 class="m-0 text-dark">Fournisseurs</h1>

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

                        <h3 class="card-title">Liste des fournisseurs</h3>
                        <h3 class="card-title" style="float: right;color: red;">Choisir Fournisseur en cliquant sur l'icone suivant : <i class="fas fa-shopping-basket"></i></h3>

                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <p>Etape 1 sur 3</p>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 33%"></div>
                    </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Numéro fournisseur</th>
                                    <th>Fournisseurs</th>
                                    <th>Choisir</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Numéro fournisseur</th>
                                    <th>Fournisseurs</th>
                                    <th>Choisir</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $fours = $DB->query('SELECT * FROM bo_Fournisseur');
                                foreach ($fours as $four) : ?>
                                    <tr>
                                        <td><?= $four->NUMFOURNISSEUR ?></td>
                                        <td><?= $four->NOMFOURNISSEUR ?></td>
                                        <td align="center"><a class="add" href="produit.php?id=<?= $four->IDFOURNISSEURS ?>"><i class="fas fa-shopping-basket"></i></a></td>
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