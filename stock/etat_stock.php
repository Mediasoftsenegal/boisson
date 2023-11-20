<? require '../page/header.php'; ?>
<? require 'lcalcul.php'; ?>
<!-- Content Header (Page header) -->
<div class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h1 class="m-0 text-dark"><i class="fa-solid fa-money-bill-trend-up"> </i>&nbsp;&nbsp;Etat du stock</h1>

            </div><!-- /.col -->

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                    <li class="breadcrumb-item active"><a href="sortie.php">sortie stock </a></li>
                    <li class="breadcrumb-item active">Etat du stock</li>
                    <li class="breadcrumb-item active"><a href="histo.php">Historiques </a></li>
                </ol>

            </div><!-- /.col -->

        </div><!-- /.row -->

    </div><!-- /.container-fluid -->

</div>
<!-- /.content-header -->

<!-- Main content -->

<section class="content">

    <div class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">Situation du stock</h3>

                </div>

                <!-- /.card-header -->

                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">

                        <thead>

                            <tr>

                                <th></th>

                                <th>id</th>

                                <th>Libellé</th>

                                <th>Conditionnement</th>

                                <th>Date inventaire</th>

                                <th>Quantité décomptée(en bouteille)</th>

                                <th>Quantité approvisionée (en bouteille)</th>

                                <th>Quantité vendue (en bouteille)</th>

                                <th>Quantité sortie(en bouteille)</th>

                                <th>Quantité virtuelle en stock</th>   

                            </tr>

                        </thead>

                        <tfoot>

                          <th></th>

                                <th></th>

                                <th></th>
                                
                                <th></th>

                                <th></th>

                                <th></th>

                                <th></th>

                                <th></th>

                                <th></th>

                                <th></th>   
                            </tr>

                        </tfoot>

                        <tbody>
                       
                        <?php $articles = $DB->query('SELECT bo_inventaire.IDARTICLE ,bo_inventaire.Date_inventaire, bo_Articles.LIBARTICLE ,bo_Articles.CONDITIONNEMENT, bo_inventaire.quantité_decompte 
								FROM bo_inventaire, bo_Articles
								where bo_inventaire.IDARTICLE= bo_Articles.IDARTICLE 
								ORDER BY Date_inventaire DESC'); 

                        $i = 0;

                        foreach ($articles as $article):
                        $datelimit=$article->Date_inventaire;
                        $i++?>
                        <? $id= $article->IDARTICLE?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $article->IDARTICLE ?></td>
                                <td><b><?= $article->LIBARTICLE ?></b></td>
                                <td><?= $article->CONDITIONNEMENT ?></td>
                                <? $dater = $article->Date_inventaire ?>
                                <? $date = explode('-',$dater) ?> <? $cond = explode('X',$article->CONDITIONNEMENT) ?>
                                <td><?= $date[2].'-'. $date[1].'-'.$date[0]?></td>
                                <td align="center"><p class="text-primary"><b><?= ($article->quantité_decompte) ?></b></p></td>                                
                                <td align="center"><p class="text-info"><b><?= fentreestock($id,$dater)* $cond[1]?></b></p></td>   
                                <td align="center"><p class="text-danger"><b><?= fventestock($id,$dater)?></b></p></td>
                                <td align="center"><?= fsortiestock($id,$dater)?></td>                             
                                <td align="center"><p class="text-success"><b><?= (($article->quantité_decompte) + fentreestock($id,$dater)* $cond[1])-(fsortiestock($id,$dater)+fventestock($id,$dater))?></b></p></td>
                            </tr>

                        <?php endforeach ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</section>

<? require '../page/footer.php'; ?>