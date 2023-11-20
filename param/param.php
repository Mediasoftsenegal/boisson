<?php require 'header.php'; ?>
<div class="content-header">



    <div class="container-fluid">



        <div class="row mb-2">



            <div class="col-sm-6">



                <h1 class="m-0 text-dark"><i class="fas fa-layer-group"> </i>&nbsp;&nbsp;Entreprise </h1>



            </div><!-- /.col -->



            <div class="col-sm-6">



                <ol class="breadcrumb float-sm-right">



                    <li class="breadcrumb-item"><a href="tabbord.php">Accueil</a></li>



                    <li class="breadcrumb-item active">Entreprise</li>



                </ol>



            </div><!-- /.col -->



        </div><!-- /.row -->



    </div><!-- /.container-fluid -->



</div>

<section class="content">

	<div class="container-fluid">

		<div class="row">

			<div class="col-8">
				<div class="card card-primary card-outline">

					<div class="card-header">

						<h3 class="card-title"></h3>

					</div>
       
        <?php   
        $params = $DB->query('SELECT * FROM bo_owner order by idowner ASC limit 1') ;
        $i = 0;
        foreach ($params as $para):

            $i++?>
        <div class="card card-widget widget-user-2">
        <div class="widget-user-header bg-warning">
        <div class="widget-user-image">
        <img  src="<?= $para->logoEse ?>" alt="User Avatar" width=100% height=100%>
        </div>

        <h3 class="widget-user-username"><?= $para->ownerEse ?></h3>
        <h5 class="widget-user-desc">Dépositaire de boissons</h5>
        </div>
        <div class="card-footer p-0">
        <ul class="nav flex-column">
        <li class="nav-item">

        Nom de l'entreprise :  <span class="float-right  bg-primary"></span>
        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="<?= $para->ownerEse ?>">
        </li>
        <li class="nav-item">

        Adresse :  <span class="float-right  bg-info"></span>
        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="<?= $para->adreEse ?>">
        </li>
        <li class="nav-item">

        Tél :  <span class="float-right  bg-success"></span>
        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="<?= $para->TelEse ?>">
        </li>
        <li class="nav-item">

        Email :  <h5 class="float-right"></h5>
        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="<?= $para->emailEse ?>">
        </li>
        <li class="nav-item">

        NINEA :  <span class="float-right  bg-danger"></span>
        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="<?= $para->nineaEse ?>">
        </li>
        <li class="nav-item">
        RC :  <span class="float-right  bg-danger"></span>
        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="<?= $para->rcEse ?>">
        </li>

        </ul>
        </div>
        </div>
        <?php endforeach ?>
        </div>
        </div>


        <div class="col-4">
        <div class="card card-primary card-outline">
        <div class="card card-primary">
        <form method="POST" action="insert_param.php" enctype="multipart/form-data"> 
        <div class="card-header">
        <h3 class="card-title">Détails de l'entreprise</h3>
        </div>   
        <div class="card-body">
        <div class="form-group">
        <label for="exampleInputEmail1">Nom de l'entreprise</label>
        <input type="text" class="form-control" name="nomEses" id="exampleInputEmail1" placeholder="Nom de l'entreprise">
        </div>
        <div class="form-group">
        <label for="exampleInputPassword1">Adresse Postale</label>
        <input type="text" class="form-control" name="adreEses" id="exampleInputPassword1" placeholder="Adresse Postale">
        </div>
        <div class="form-group">
        <label for="exampleInputPassword1">Tél.</label>
        <input type="text" class="form-control" name="telEses" id="exampleInputPassword1" placeholder="Tel.">
        </div>
        <div class="form-group">
        <label for="exampleInputPassword1">Email</label>
        <input type="mail" class="form-control" name="EmailEses" id="exampleInputPassword1" placeholder="Email">
        </div>
        <div class="form-group">
        <label for="exampleInputPassword1">NINEA</label>
        <input type="text" class="form-control" name="ninEses" id="exampleInputPassword1" placeholder="NINEA">
        </div>
        <div class="form-group">
        <label for="exampleInputPassword1">registre de commerce</label>
        <input type="text" class="form-control" name="rcEses" id="exampleInputPassword1" placeholder="RC">
        </div>
        <div class="form-group">
        <label for="exampleInputFile">Logo</label>
        <div class="input-group">
            <div class="input-group-append">
            <input type="hidden" name="MAX_FILE_SIZE" value="20000">
                    <input type="file" class="form-control" id="logoEses" name="logoEses"><br><br>
            </div>
        </div>
        <div class="card-footer">
        <button type="submit" name="valider" class="btn btn-primary">Valider</button>
        </div>
        </form>
        </div>
        </div>
        </div>
    </div>
</div>


