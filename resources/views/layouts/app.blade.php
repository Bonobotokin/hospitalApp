<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard One | Notika - Notika Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet"> -->
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.transitions.css')}}">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu/meanmenu.min.css')}}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css/normalize.css')}}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css/jvectormap/jquery-jvectormap-2.0.3.css')}}">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/notika-custom-icon.css')}}">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css/wave/waves.min.css')}}">

    <!-- dialog CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css/dialog/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dialog/dialog.css')}}">

    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

    <!-- modernizr JS
		============================================ -->
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!-- <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="#"><img src="img/logo/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            <li class="nav-item dropdown">
                                <a href="#"  class="nav-link dropdown-toggle"><span><i class="notika-icon notika-search"></i></span></a>
                                <div role="menu" class="dropdown-menu search-dd animated flipInX">
                                    <div class="search-input">
                                        <i class="notika-icon notika-left-arrow"></i>
                                        <input type="text">
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link count-indicator dropdown-toggle" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('logout') }}" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa  fa-sign-out"></i>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="#"><img src="{{asset('assets/img/logo.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            <li class="nav-item dropdown">
                                <a href="{{ route('home') }}" class="nav-link waves-effect" data-toggle="tooltip"
                                 data-placement="bottom" title="" data-original-title="Acceuille">
                                    <i class="notika-icon notika-house"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{ route('administrator.page') }}" class="nav-link waves-effect" data-toggle="tooltip"
                                 data-placement="bottom" title="" data-original-title="Administrator">
                                    <i class="fa fa-briefcase"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{route('magasin.depots')}}" class="nav-link waves-effect" data-toggle="tooltip"
                                 data-placement="bottom" title="" data-original-title="Magasin">
                                    <i class="fa fa-archive"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link waves-effect" data-toggle="tooltip"
                                 data-placement="bottom" title="" data-original-title="Pharmacie">
                                    <i class="fa fa-medkit"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link waves-effect" data-toggle="tooltip"
                                 data-placement="bottom" title="" data-original-title="Receptioniste">
                                    <i class="fa fa-tasks"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link waves-effect" data-toggle="tooltip"
                                 data-placement="bottom" title="" data-original-title="Medecins">
                                    <i class="fa fa-stethoscope"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{ route('journaliere.encaissement') }}" class="nav-link waves-effect" data-toggle="tooltip"
                                 data-placement="bottom" title="" data-original-title="Caisse">
                                    <i class="fa fa-money"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link count-indicator dropdown-toggle" style="color:red" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('logout') }}" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa  fa-sign-out"></i>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->

    <div class="main-menu-area mg-tb-40">

    <div class="container">
        @yield('content')
    </div>
    </div>

    <!-- jquery ============================================ -->
    <script src="{{asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{asset('assets/js/jquery-price-slider.js')}}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{asset('assets/js/jquery.scrollUp.min.js')}}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{asset('assets/js/meanmenu/jquery.meanmenu.js')}}"></script>
    <!-- counterup JS
		============================================ -->
    <script src="{{asset('assets/js/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/js/counterup/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/counterup/counterup-active.js')}}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{asset('assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="{{asset('assets/js/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('assets/js/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('assets/js/jvectormap/jvectormap-active.js')}}"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="{{asset('assets/js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('assets/js/sparkline/sparkline-active.js')}}"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="{{asset('assets/js/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('assets/js/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('assets/js/flot/curvedLines.js')}}"></script>
    <script src="{{asset('assets/js/flot/flot-active.js')}}"></script>
    <!-- knob JS
		============================================ -->
    <script src="{{asset('assets/js/knob/jquery.knob.js')}}"></script>
    <script src="{{asset('assets/js/knob/jquery.appear.js')}}"></script>
    <script src="{{asset('assets/js/knob/knob-active.js')}}"></script>
    <!--  wave JS
		============================================ -->
    <script src="{{asset('assets/js/wave/waves.min.js')}}"></script>
    <script src="{{asset('assets/js/wave/wave-active.js')}}"></script>
    <!--  dialog JS
		============================================ -->
    <script src="{{asset('assets/js/dialog/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/js/dialog/dialog-active.js')}}"></script>
    <!--  todo JS
		============================================ -->
    <script src="{{asset('assets/js/todo/jquery.todo.js')}}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <!--  Chat JS
		============================================ -->
    <script src="{{asset('assets/js/chat/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/chat/jquery.chat.js')}}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <!-- tawk chat JS
		============================================ -->
    <script src="{{asset('assets/js/tawk-chat.js')}}"></script>
</body>

</html>