<?php require 'header.php'; ?>
<!-- Content Header (Page header) -->



<div class="content-header">



    <div class="container-fluid">



        <div class="row mb-2">



            <div class="col-sm-6">



                <h1 class="m-0 text-dark"><i class="fas fa-user"> </i>&nbsp;&nbsp; Utilisateurs</h1>



            </div><!-- /.col -->



            <div class="col-sm-6">



                <ol class="breadcrumb float-sm-right">



                    <li class="breadcrumb-item"><a href="tabbord.php">Accueil</a></li>



                    <li class="breadcrumb-item active">Utilisateurs</li>



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



						<h3 class="card-title">Liste des Utilisateurs</h3>

					</div>



					<!-- /.card-header -->

					<div class="card-body">

						<table id="example1" class="table table-bordered table-striped">

							<thead>

								<tr>
									
									<th>login</th>
                                    <th>Nom utilisateur</th>
                                    <th>Profil</th>
									<th>Mot de passe</th>
									<th>Actions</th>

								</tr>

							</thead>

							<tfoot>

								<tr>
                                     <th>login</th>
                                    <th>Nom utilisateur</th>
                                    <th>Profil</th>
									<th>Mot de passe</th>									
									<th>Actions</th>
								</tr>

							</tfoot>

							<tbody>

							<?php $userbois = $DB->query('SELECT * FROM bo_users'); 

                            foreach ($userbois as $userboi):?>

								<tr>
									
									<td><?= $userboi->PROFIL ?></td>
									<td><?= $userboi->NOMUTILISATEUR ?></td>
                                    <td><?= $userboi->LOGIN_USER ?></td>
                                    <td><?= $userboi->PASSWORD_USER ?></td>
									<td align="center"><a class="add" href="modif.php?add=<?= $userboi->IDUTILISATEUR ?>&idf=<?= $userboi->IDUTILISATEUR ?>"><i class="fas fa-shopping-basket"></i></a></td>
								</tr>

							<?php endforeach ?>

							</tbody>

						</table>

					</div>

				</div>

			</div>

			<div class="col-4">

				<div class="card card-primary card-outline">

					<form action="insert_user.php" method="POST">

						<div class="card-header">

							<h4 class="card-title">Formulaire utilisateur</h4>

						</div>

						<div class="card-body">
						<div class="form-group">

								<label class="control-label">Profil</label>

								<input class="form-control" name="PROFIL" placeholder="Profil" type="text"/>

							</div>			
						<div class="form-group">

								<label class="control-label">Nom utilisateur</label>

								<input class="form-control" name="NOMUTILISATEUR" placeholder="Nom utilisateur" type="text"/>

							</div>

							<div class="form-group">

								<label class="control-label">Login</label>

								<input class="form-control" name="LOGINS" placeholder="login" type="text"/>

							</div>

							<div class="form-group">

								<label class="control-label">Mot de passe</label>

								<input class="form-control" name="MDP" placeholder="Mot de passe" type="text"/>

							</div>

						</div>

						<div class="card-footer">

							<button type="submit" class="btn btn-warning" name="valider">Valider</button>

						</div>

					</form>

				</div>

			</div>

		</div>

	</div>

</section>

<?php require '../page/footer.php'; ?>