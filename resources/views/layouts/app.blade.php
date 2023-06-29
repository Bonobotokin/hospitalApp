<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Salfa') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
    <!-- Data Table -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <! <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
</head>
<style>
    .alertSucess {
        padding: 20px;
        background-color: #00d25b;
        border-color: #00d25b;
        color: white;
        position: fixed;
        right: 0;
        z-index: 1000;
    }

    .alertDanger {
        padding: 20px;
        background-color: #fc424a;
        border-color: #fc424a;
        color: white;
        position: fixed;
        right: 0;
        z-index: 1000;
    }

    .alertWarning {
        padding: 20px;
        background-color: #c6a319;
        border-color: #c6a319;
        color: white;
        position: fixed;
        right: 0;
        z-index: 1000;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }

    #nav-link {
        color: #ffffff !important;
    }

    #nav-link:hover {
        text-decoration: none !important;
        cursor: pointer !important;
    }
</style>

<body>
    <div class="container-scroller">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href="index.html"><img src="{{ asset('assets/images/logo.svg') }}" alt="logo" /></a>
                <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo" /></a>
            </div>
            <ul class="nav">
                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                <img class="img-xs rounded-circle " src="{{ asset('assets/images/faces/face15.jpg') }}" alt="">

                            </div>
                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
                                <span>{{ Auth::user()->email }}</span>
                            </div>
                        </div>
                        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                            <a href="#" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-primary"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-onepassword  text-info"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-calendar-today text-success"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ route('home') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">Tableaux de bord</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <p class="nav-link">Administrator</p>
                </li>
                <!-- <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#ui-parametres" aria-expanded="false" aria-controls="ui-parametres">
                        <span class="menu-icon">
                            <i class="mdi mdi-settings"></i>
                        </span>
                        <span class="menu-title">Parametres</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-parametres">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index.produits') }}">
                                    Types Consultation
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#ui-personnel" aria-expanded="false" aria-controls="ui-personnel">
                        <span class="menu-icon">
                            <i class="mdi mdi-settings"></i>
                        </span>
                        <span class="menu-title">Personnel</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-personnel">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('personnel.liste') }}">
                                    Liste Personnel
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('personnel.nouveaux') }}">
                                    Nouveaux Personnel
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#ui-achat_livraison" aria-expanded="false" aria-controls="ui-achat_livraison">
                        <span class="menu-icon">
                            <i class="mdi mdi-home"></i>
                        </span>
                        <span class="menu-title">Produits</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-achat_livraison">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('produits.achat') }}">
                                    Achat des Produits
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('All.Livraison') }}">
                                    Livraison des Produits
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Masgasin & magasinier -->

                <li class="nav-item menu-items">
                    <p class="nav-link">Produits Medicale</p>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#ui-fourniture" aria-expanded="false" aria-controls="ui-fourniture">
                        <span class="menu-icon">
                            <i class="mdi mdi-home"></i>
                        </span>
                        <span class="menu-title">Magasin</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-fourniture">
                        <ul class="nav flex-column sub-menu">

                            <li class="nav-item">
                                <a class="nav-link" href="{{route('depots')}}">
                                    Depots
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index.produits') }}">
                                    Listes des Produits
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index.achat.produits') }}">
                                    Achat des Produits
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('liste.reception') }}">
                                    Listes des Livraison
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('commandeAll') }}">
                                    Listes des Commandes
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Pharmacie & Pharmacien -->

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#ui-pharmacie" aria-expanded="false" aria-controls="ui-pharmacie">
                        <span class="menu-icon">
                            <i class="mdi mdi-home"></i>
                        </span>
                        <span class="menu-title">Pharmacie</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-pharmacie">
                        <ul class="nav flex-column sub-menu">

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('distribution') }}">
                                    Distribution
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pharmacie.stock') }}">
                                    Stock Medicament
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('commande.index') }}">
                                    Commande Medicaments
                                </a>
                            </li>
                            <!-- 
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index.achat.produits') }}">
                                    Achat des Produits
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('liste.reception') }}">
                                    Listes des Livraison
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </li>
                <!-- Dispensaire -->
                <li class="nav-item menu-items">
                    <p class="nav-link">Dispensaire</p>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#ui-Reception" aria-expanded="false" aria-controls="ui-Reception">
                        <span class="menu-icon">
                            <i class="mdi mdi-home"></i>
                        </span>
                        <span class="menu-title">Reception</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-Reception">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('liste.consultation') }}">
                                    Consultation
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('liste.patient') }}">
                                    Liste des Patient
                                </a>
                            </li>
                            <!-- 
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index.achat.produits') }}">
                                    Achat des Produits
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('liste.reception') }}">
                                    Listes des Livraison
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#ui-Medecin" aria-expanded="false" aria-controls="ui-Medecin">
                        <span class="menu-icon">
                            <i class="mdi mdi-home"></i>
                        </span>
                        <span class="menu-title">Medecin</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-Medecin">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('get.all.consultation') }}">
                                    Liste Consultation
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('liste.patient') }}">
                                    Liste des Patient
                                </a>
                            </li>
                            <!-- 
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index.achat.produits') }}">
                                    Achat des Produits
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('liste.reception') }}">
                                    Listes des Livraison
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#ui-Caisse" aria-expanded="false" aria-controls="ui-Caisse">
                        <span class="menu-icon">
                            <i class="mdi mdi-home"></i>
                        </span>
                        <span class="menu-title">Caisse</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-Caisse">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('all.patient.payeable') }}">
                                    Patient Caisse
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    Caisse Journaliere
                                </a>
                            </li>
                            <!-- 
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index.achat.produits') }}">
                                    Achat des Produits
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('liste.reception') }}">
                                    Listes des Livraison
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="index.html">
                        <img src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav w-100">
                        <li class="nav-item w-100">
                            <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                                <input type="text" class="form-control" placeholder="Search products">
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-nav-right">

                        {{-- <li class="nav-item nav-settings d-none d-lg-block">
                            <a class="nav-link" href="{{ route('parametre') }}">
                        <i class="mdi mdi-settings"></i>
                        </a>
                        </li> --}}
                        @guest
                        @else
                        <li class="nav-item border-left">
                            <a class="nav-link count-indicator dropdown-toggle" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('logout') }}" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-logout text-danger"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @endguest
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    @if ($message = Session::get('success'))
                    <div class="alertSucess">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <strong>Success!</strong>
                        {{ $message }}
                    </div>
                    @endif
                    @yield('content')
                </div>

                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">
                            Copyright © TSANGAMILA 2022
                        </span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
</body>
{{-- New fourniture --}}

@extends('layouts.script')
</html>