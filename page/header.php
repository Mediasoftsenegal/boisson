<?php session_start(); require '_header.php';
if ($_SESSION["connecter"] == "Oui") {
} else {
    header("Location : ../index.php");
}
 ?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dépôt de boissons | Tableau de bord</title>

    <script src="https://kit.fontawesome.com/73032f3301.js" crossorigin="anonymous"></script>

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
            <a href="../param/param.php" class="nav-link"><i class="fas fa-gears"> </i>&nbsp;&nbsp;Paramètres</a>
            </li>   
            <li class="nav-item d-none d-sm-inline-block">

                <a href="../fourni/fournisseur.php" class="nav-link"><i class="fa-solid fa-file-contract"> </i>&nbsp;&nbsp;Fournisseurs</a>

            </li>

            <li class="nav-item d-none d-sm-inline-block">

                <a href="../client/client.php" class="nav-link"><i class="fa-solid fa-address-card"> </i>&nbsp;&nbsp;Clients</a>

            </li>

            <li class="nav-item d-none d-sm-inline-block">

                <a href="../article/article.php" class="nav-link"><i class="fa-solid fa-jar"> </i>&nbsp;&nbsp;Articles</a>

            </li>

            <li class="nav-item d-none d-sm-inline-block">

                <a href="../taxe/taxe.php" class="nav-link"><i class="fa-solid fa-money-check"> </i>&nbsp;&nbsp;Taxes</a>

            </li>

            <li class="nav-item d-none d-sm-inline-block">

                <a href="../tarif/tarif.php" class="nav-link"><i class="fa-solid fa-sack-xmark"> </i>&nbsp;&nbsp;Tarification</a>

            </li>

            <li class="nav-item d-none d-sm-inline-block">

                <a href="../appro/appro.php" class="nav-link"><i class="fa-solid fa-truck-field"> </i>&nbsp;&nbsp;Approvisionnement</a>

            </li>

            <li class="nav-item d-none d-sm-inline-block">

                <a href="../commande/commande.php" class="nav-link"><i class="fa-solid fa-indent"> </i>&nbsp;&nbsp;Commandes</a>

            </li>

            <li class="nav-item d-none d-sm-inline-block">

                <a href="../factures/lis_factures.php" class="nav-link"><i class="fa-solid fa-file-invoice"> </i>&nbsp;&nbsp;Factures</a>

            </li>

            <li class="nav-item d-none d-sm-inline-block">

                <a href="../factures/etat_suivi.php" class="nav-link"><i class="fa-solid fa-money-bill-trend-up"> </i>&nbsp;&nbsp;Etats de suivi</a>
                
            </li>

            <li class="nav-item d-none d-sm-inline-block">

                <a href="../stock/etat_stock.php" class="nav-link"><i class="fa-solid fa-boxes-packing"> </i>&nbsp;&nbsp;Stock</a>
                
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