<?php  

session_start();

if(@$_SESSION['pengurus']) {

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>SPK Bantuan Sosial Metode SAW</title>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <link href="lite/css/style.css" rel="stylesheet">
    <link href="lite/css/colors/blue.css" id="theme" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper">
        <!-- Topbar header - style you can find in pages.scss -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon -->
                        <b class="text-white">
                            <img src="assets/images/kny/logo.png" alt="user" class="profile-pic m-r-10" />
                            <!-- <i class="wi wi-sunset"></i> -->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="text-white">
                            SPK KNY
                        </span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item">
                            <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a>
                        </li>
                        <!-- Search -->
<!--                         <li class="nav-item hidden-sm-down search-box">
                            <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li> -->
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="assets/images/users/1.jpg" alt="user" class="profile-pic m-r-10" /><?= $_SESSION['level'] ?></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- End Topbar header -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                            <a class="waves-effect waves-dark" href="index.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard
                            </span></a>
                        </li>
<!--                         <li>
                            <a class="waves-effect waves-dark" href="kriteria.php" aria-expanded="false"><i class="mdi mdi-apps"></i><span class="hide-menu">Data Kriteria
                            </span></a>
                        </li> -->
<!--                         <li>
                            <a class="waves-effect waves-dark" href="solia.php" aria-expanded="false"><i class="mdi mdi-account-edit"></i><span class="hide-menu">Data Solia
                            </span></a>
                        </li> -->
                        <li>
                            <a class="waves-effect waves-dark" href="pilihan.php" aria-expanded="false"><i class="mdi mdi-account-plus"></i><span class="hide-menu">Data Keluarga</span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="nilai.php" aria-expanded="false"><i class="mdi mdi-certificate"></i><span class="hide-menu">Hasil </span></a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item--><a class="link" data-toggle="tooltip" title=""><i class=""></i></a>
                <!-- item--><a href="logout.php" class="link btn-danger text-white" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
                <!-- item--><a class="link" data-toggle="tooltip" title=""><i class=""></i></a>
            </div>
            <!-- End Bottom points-->
        </aside>
        <!-- Page wrapper  -->
        <div class="page-wrapper">

        <script src="assets/plugins/jquery/jquery.min.js"></script>
        <script src="assets/plugins/bootstrap/js/tether.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

                  <?php 
        }else {
          header("location: logout.php");
        }
        ?>