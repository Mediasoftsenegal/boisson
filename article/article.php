<?php require '../page/header.php'; ?>

<!-- Content Header (Page header) -->

<div class="content-header">



    <div class="container-fluid">



        <div class="row mb-2">



            <div class="col-sm-6">



                <h1 class="m-0 text-dark"><i class="fa-solid fa-jar"> </i>&nbsp;&nbsp;Articles</h1>



            </div><!-- /.col -->



            <div class="col-sm-6">



                <ol class="breadcrumb float-sm-right">



                    <li class="breadcrumb-item"><a href="tabbord.php">Accueil</a></li>



                    <li class="breadcrumb-item active">Articles</li>



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
						<h3 class="card-title">Liste des articles </h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">

                        <thead>

                            <tr>

                                <th></th>

                                <th>Libellé</th>

                                <th>Catégorie</th>

                                <th>Type</th>

                                <th>Prix d'achat liquide</th>

                                <th>Prix d'achat emballage</th>

                                <th>Fournisseurs</th>

                                <th>Conditionnement</th>

                                <th>Groupe</th>

                                <th>Actions</th>

                            </tr>

                        </thead>

                        <tfoot>

                            <tr>

                                <th></th>

                                <th>Libellé</th>

                                <th>Catégorie</th>

                                <th>Type</th>

                                <th>Prix d'achat liquide</th>

                                <th>Prix d'achat emballage</th>

                                <th>Fournisseurs</th>

                                <th>Conditionnement</th>

                                <th>Groupe</th>

                                <th>Actions</th>
                            </tr>

                        </tfoot>

                        <tbody>

                        <?php
                       
                        $articles = $DB->query('SELECT * FROM ((bo_Articles INNER JOIN bo_Categorie ON bo_Articles.IDCATEGORIE = bo_Categorie.IDCATEGORIE)
                         INNER JOIN bo_Fournisseur ON bo_Articles.IDFOURNISSEURS = bo_Fournisseur.IDFOURNISSEURS)'); 
                             
                        $i = 0;
                        foreach ($articles as $article):
                        $i++?>

                            <tr>

                                <td><?= $i ?></td>

                                <td><?= $article->LIBARTICLE ?></td>

                                <td><?= $article->LIBACATEG ?></td>

                                <td><?= $article->TYPEARTICLE ?></td>

                                <td><?= $article->PRIXACHATLIQUIDE ?></td>

                                <td><?= $article->PRIXACHATEMBALLAGE ?></td>

                                <td><?= $article->NOMFOURNISSEUR ?></td>

                                <td><?= $article->CONDITIONNEMENT ?></td>

                                <td><?= $article->LIBELLEGROUPE ?></td>

                                <td><a class="add" href="article.php?id=<?= $article->IDARTICLE ?>"><i class="fas fa-shopping-basket"></i></a></td>
                            </tr>

                        <?php endforeach ?>

                        </tbody>

                    </table>
                    </div>

                </div>

                </div>

                <div class="col-4">
                <div class="card card-primary card-outline">

<form action="insert_article.php" method="POST">

    <div class="card-header">

        <h4 class="card-title">Formulaire de saisie d'un article</h4>

    </div>

    <div class="card-body">
    <div class="card-body">
<dl>
<dt>Nouvel article</dt>
<dd>Pour ajouter un nouvel article  cliquer sur le menu article en haut,</dd>
<dd>ensuite renseigner le formulaire et cliquer sur le bouton ajouter</dd>
<dt>Modification</dt>
<dd>Pour modifier cliquer sur l'icône dans la colonne action</dd>
</dl>
</div>
    <div class="form-group">

        <label class="control-label">libellé</label>
        <?
        if (isset($_GET['id'])){
        $reponse = $DB->query("SELECT IDARTICLE,LIBARTICLE,TYPEARTICLE,PRIXACHATLIQUIDE,PRIXACHATEMBALLAGE,SEUIL,REFERENCE,CONDITIONNEMENT,PRIXBOUTEILLE,CONSIGNATION,PRIXTTC,LIBELLEGROUPE,
        ETATPRODUIT,bo_Articles.IDCATEGORIE,LIBACATEG,NOMFOURNISSEUR,bo_Articles.IDFOURNISSEURS,bo_Articles.SEUIL
        FROM bo_Articles,bo_Categorie,bo_Fournisseur 
        WHERE bo_Articles.IDCATEGORIE=bo_Categorie.IDCATEGORIE
        AND bo_Articles.IDFOURNISSEURS=bo_Fournisseur.IDFOURNISSEURS
        AND bo_Articles.IDARTICLE  =".$_GET['id']); 
        foreach ($reponse as $donne):?>
        <input type="hidden" name="IDARTICLE" class="form-control is-warning" id="inputWarning" value="<?= $_GET['id'] ?>">
        <input type="text" name="libarticl" class="form-control is-warning" id="inputWarning" value="<?= $donne->LIBARTICLE ?>">
        <? endforeach; ?>
        <? } else { ?>  
        <input class="form-control" name="libarticl" placeholder="libellé" type="text"/>
        <? } ?>

</div> 		
    

    <div class="form-group">

    <label class="control-label">Catégorie</label>
    
    <select name="id_categ" class="form-control select">
    <?
        if (isset($_GET['id'])){ ?>
            <option value="<?= $donne->IDCATEGORIE ?>"><?= $donne->LIBACATEG ?></option>
            <? } else { ?>  
            <option>Choisir une categorie</option>       
        <? $categ = $DB->query('SELECT * FROM bo_Categorie'); 

        foreach ($categ as $catego):?>

        <option value="<?= $catego->IDCATEGORIE ?>"><?= $catego->LIBACATEG ?></option>

        <? endforeach; ?> 
        <? } ?>

    </select>

    </div>
    <div class="form-group">

<label class="control-label">Type</label>

<select name="type_article" class="form-control select">
<?
        if (isset($_GET['id'])){ ?>
            <option value="<?= $donne->TYPEARTICLE ?>"><?= $donne->TYPEARTICLE ?></option>
            <? } else { ?>  
    <option>Choisir un Type</option>  
    <? $typo = $DB->query('SELECT DISTINCT TYPEARTICLE FROM bo_Articles WHERE TYPEARTICLE IS NOT NULL'); 

foreach ($typo as $typos):?>

<option value="<?= $typos->TYPEARTICLE ?>"><?= $typos->TYPEARTICLE ?></option>

<? endforeach; ?> 
<? } ?>
</select>

</div>
        <div class="form-group">

            <label class="control-label">Prix d'achat liquide</label>
            <?
             if (isset($_GET['id'])){?>
            <input type="text" name="prixachat" class="form-control is-warning" id="inputWarning" value="<?= $donne->PRIXACHATLIQUIDE ?>"> 
            <? } else { ?> 
            <input class="form-control" name="prixachat" placeholder="Prix d'achat liquide" type="int"/>
            <? } ?>
        </div>
        <div class="form-group">

            <label class="control-label">Prix d'achat emballage</label>
            <?
             if (isset($_GET['id'])){?>
            <input type="text" name="prixemballage" class="form-control is-warning" id="inputWarning" value="<?= $donne->PRIXACHATEMBALLAGE ?>"> 
            <? } else { ?> 
            <input class="form-control" name="prixemballage" placeholder="Prix d'achat emballage" type="int"/>
            <? } ?>
        </div>
        <div class="form-group">

    <label class="control-label">Fournisseur</label>

        <select name="IDFOURNISSEURS" class="form-control select">
        <?
        if (isset($_GET['id'])){ ?>
            <option value="<?= $donne->IDFOURNISSEURS ?>"><?= $donne->NOMFOURNISSEUR ?></option>
            <? } else { ?>  
            <option>Choisir un fournisseur</option>

            <? $fourni = $DB->query('SELECT * FROM bo_Fournisseur'); 

            foreach ($fourni as $fourniss):?>

            <option value="<?= $fourniss->IDFOURNISSEURS ?>"><?= $fourniss->NOMFOURNISSEUR ?></option>

            <? endforeach; ?>
            <? } ?>
        </select>

</div>     
<div class="form-group">

<label class="control-label">Conditionnement</label>

    <select name="conds" class="form-control select">
    <?
        if (isset($_GET['id'])){ ?>
            <option value="<?= $donne->CONDITIONNEMENT ?>"><?= $donne->CONDITIONNEMENT ?></option>
            <? } else { ?>  
        <option>Choisir un conditionnement</option>

        <? $condi = $DB->query('SELECT DISTINCT CONDITIONNEMENT FROM bo_Articles order by CONDITIONNEMENT ASC'); 

        foreach ($condi as $condit):?>

        <option value="<?= $condit->CONDITIONNEMENT ?>"><?= $condit->CONDITIONNEMENT ?></option>

        <? endforeach; ?>
        <? } ?>
    </select>
    </div> 
    <div class="form-group">

<label class="control-label">Groupe</label>

    <select name="grpe" class="form-control select">
    <?
        if (isset($_GET['id'])){ ?>
            <option value="<?= $donne->LIBELLEGROUPE ?>"><?= $donne->LIBELLEGROUPE ?></option>
            <? $condi = $DB->query('SELECT DISTINCT LIBELLEGROUPE FROM bo_Articles order by LIBELLEGROUPE ASC'); 

        foreach ($condi as $condit):?>

        <option value="<?= $condit->LIBELLEGROUPE ?>"><?= $condit->LIBELLEGROUPE ?></option>

        <? endforeach; ?>
            <? } else { ?>  
        <option>Choisir un groupe</option>

        <? $condi = $DB->query('SELECT DISTINCT LIBELLEGROUPE FROM bo_Articles order by LIBELLEGROUPE ASC'); 

        foreach ($condi as $condit):?>

        <option value="<?= $condit->LIBELLEGROUPE ?>"><?= $condit->LIBELLEGROUPE ?></option>

        <? endforeach; ?>
        <? } ?>
    </select>
    </div> 
    <div class="form-group">

<label class="control-label">Seuil</label>
<?
if (isset($_GET['id'])){?>
<input type="text" name="seuils" class="form-control is-warning" id="inputWarning" value="<?= $donne->SEUIL ?>"> 
<? } else { ?> 
<input class="form-control" name="seuils" placeholder="Seuil minimum" type="int"/>
<? } ?>
</div>
</div>                     
    </div>

    <div class="card-footer">

        <button type="submit" class="btn btn-success" name="valider_article">Ajouter</button>
        <button type="submit" class="btn btn-warning" name="modifier_article">Modifier</button>    
    </div>

</form>

</div>           
                </div>
                </div>

            </div>

        </div>

    </div>

</section>

<?php require '../page/footer.php'; ?>