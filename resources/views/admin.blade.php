<!DOCTYPE html>
<html>

<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>Administration - Crème de la Crème</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
  {!! HTML::style('assets/fonts/glyphicons-pro/glyphicons-pro.css') !!}
  {!! HTML::style('assets/fonts/icomoon/icomoon.css') !!}
  @yield('css')
  {!! HTML::style('assets/skin/default_skin/css/theme.css') !!}



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

</head>

<body class="<?php if(!Request::is('admin/dashboard')) echo 'sb-l-m sb-l-disable-animation'; ?>">

 

  <!-- Start: Main -->
  <div id="main">



    <!-- Start: Sidebar -->
    <aside id="sidebar_left" class="nano nano-light affix">
      <!-- Start: Header -->
      <header class="navbar navbar-fixed-top navbar-shadow">
        <div class="navbar-branding">
          <a class="navbar-brand" href="z">
            <b>Crème</b> de la <b>Crème</b>
          </a>
          <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
        </div>
      </header>
      <!-- End: Header -->
      <!-- Start: Sidebar Left Content -->
      <div class="sidebar-left-content nano-content">

        <!-- Start: Sidebar Header -->
        <header class="sidebar-header">

          <!-- Sidebar Widget - Author -->
          <div class="sidebar-widget author-widget">
            <div class="media">
              <div class="media-body">
                <div class="media-author">{{Auth::user()->name}}</div>
                <div class="media-links">
                   <a href="{{url('admin/logout')}}">Déconnexion</a>
                </div>
              </div>
            </div>
          </div>

        </header>
        <!-- End: Sidebar Header -->

        <!-- Start: Sidebar Menu -->
        <ul class="nav sidebar-menu">
          <li>
            <a href="{{ url('admin/dashboard')}}">
              <span class="imoon imoon-office"></span>
              <span class="sidebar-title">Tableau de bord </span>
            </a>
          </li>
        @if(Auth::user()->rank > 0)
          <li class="sidebar-label pt20">Administrateur </li>
          <li>
            <a href="{{ url('admin/users')}}">
              <span class="imoon imoon-user3"></span>
              <span class="sidebar-title">Utilisateurs </span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/payments')}}">
              <span class="glyphicons glyphicons-usd"></span>
              <span class="sidebar-title">Paiements </span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/missions')}}">
              <span class="fa fa-briefcase"></span>
              <span class="sidebar-title">Missions </span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/statistics')}}">
              <span class="fa fa-bar-chart-o"></span>
              <span class="sidebar-title">Statistiques </span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/statistics')}}">
              <span class="fa fa-bar-chart-o"></span>
              <span class="sidebar-title">Logs utilisateurs </span>
            </a>
          </li>
        @endif

          <li class="sidebar-label pt15">Opérateur </li>
          <li>
            <a href="{{ url('admin/messages')}}">
              <span class="fa fa-envelope-o"></span>
              <span class="sidebar-title">Messages </span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/students')}}">
              <span class="glyphicons glyphicons-turtle"></span>
              <span class="sidebar-title">Etudiants </span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/my-stats')}}">
              <span class="imoon imoon-stats"></span>
              <span class="sidebar-title">Mes statistiques </span>
            </a>
          </li>
          

        </ul>
        <!-- End: Sidebar Menu -->


      </div>
      <!-- End: Sidebar Left Content -->

    </aside>
    <!-- End: Sidebar Left -->

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

    
      <!-- Start: Topbar -->
      <header id="topbar" class="alt">
        <div class="topbar-left">
          @yield('topbar')
        </div>
        <div class="topbar-right">
          <div class="ml15 ib va-m" id="toggle_sidemenu_r">
            <a href="{{ url('admin/logout')}}" class="pl5" data-toggle="tooltip" data-placement="bottom" title="Déconnexion">
              <i class="fa fa-sign-in fs22 text-primary" ></i>
            </a>
          </div>
        </div>
      </header>
      <!-- End: Topbar -->

      <!-- Begin: Content -->
      <section id="content" class="animated fadeIn">
        
        @yield('content')

      </section>
      <!-- End: Content -->

      <!-- Begin: Page Footer -->
      <footer id="content-footer" class="affix">
        <div class="row">
          <div class="col-md-6">
            <span class="footer-legal">© 2015 Crème de la Crème - Tous droits réservés</span>
          </div>
        </div>
      </footer>
      <!-- End: Page Footer -->

    </section>
    <!-- End: Content-Wrapper -->


  </div>
  <!-- End: Main -->

  <!-- BEGIN: PAGE SCRIPTS -->

  <!-- jQuery -->
    {!! HTML::script('vendor/jquery/jquery-1.11.1.min.js') !!}
    {!! HTML::script('vendor/jquery/jquery_ui/jquery-ui.min.js') !!}



  @yield('js')
  <!-- Theme Javascript -->
    {!! HTML::script('assets/js/utility/utility.js') !!}
    {!! HTML::script('assets/js/demo/demo.js') !!}
    {!! HTML::script('assets/js/main.js') !!}
  <script type="text/javascript">
  jQuery(document).ready(function() {
    "use strict";
    // Init Theme Core    
    Core.init();
    Demo.init();

    @yield('js-inside')
  });
  </script>
  <!-- END: PAGE SCRIPTS -->

</body>

</html>
