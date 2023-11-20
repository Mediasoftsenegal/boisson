<?php session_start(); 
require '../db.class.php';  
$DB = new DB();?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dépôt de boissons | Tableau de bord</title>

    <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">

    <!-- Tell the browser to be responsive to screen width -->

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">

    <!-- Ionicons -->

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Tempusdominus Bbootstrap 4 -->

    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <!-- iCheck -->

    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- JQVMap -->

    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">

    <!-- Theme style -->

    <link rel="stylesheet" href="../dist/css/adminlte.min.css">

    <!-- overlayScrollbars -->

    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <!-- Daterange picker -->

    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">

    <!-- summernote -->

    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">

    <!-- Google Font: Source Sans Pro -->

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body>



    <!-- Navbar -->

    <nav class="navbar navbar-expand navbar-white navbar-light bg-light">

        <!-- Left navbar links -->

        <ul class="navbar-nav">
        
            <li class="nav-item d-none d-sm-inline-block">

            <a href="../tabbord/tabbord.php" class="nav-link"><i class="fas fa-home"> </i>&nbsp;&nbsp;Accueil</a>

            </li>
            <li class="nav-item d-none d-sm-inline-block">
            <a href=../param/param.php" class="nav-link"> <i class="fas fa-book"> </i>&nbsp;&nbsp; Entreprise</a>
            </li>   
            <li class="nav-item d-none d-sm-inline-block">

                <a href="../param/user.php" class="nav-link"><i class="fas fa-user"> </i>&nbsp;&nbsp; Utilisateurs</a>

            </li>

            <li class="nav-item d-none d-sm-inline-block">

                <a href="inventaire.php" class="nav-link"><i class="fas fa-layer-group"> </i>&nbsp;&nbsp;Inventaire</a>

            </li>

        </ul>



        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown">

                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">

                    <i class="fas fa-user"></i>

                </a>

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">

                    <span class="dropdown-item dropdown-header">Dépot</span>

                    <div class="dropdown-divider"></div>

                    <span href="#" class="dropdown-item">

                        <i class="far fa-user mr-2"></i> <?= $_SESSION["nom"] ?> (<?= $_SESSION["profil"] ?>)

                    </span>

                    <div class="dropdown-divider"></div>

                    <a href="../deconn.php" class="dropdown-item text-center">

                        <i class="fa fa-logout mr-2"></i> Déconnexion

                    </a>

                </div>

            </li>

        </ul>

    </nav>

    <!-- /.navbar -->

    <hr>

    <!-- Main Sidebar Container -->



    <!-- Content Wrapper. Contains page content -->

    <div class="container-fluid">