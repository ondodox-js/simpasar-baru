<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="{{ asset('dashio/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('dashio/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('dashio/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!--external css-->
  <link href="{{ asset('dashio/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{ asset('dashio/css/zabuto_calendar.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('dashio/lib/gritter/css/jquery.gritter.css') }}" />
  <!-- Custom styles for this template -->
  <link href="{{ asset('dashio/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('dashio/css/my-style.css') }}" rel="stylesheet">
  <link href="{{ asset('dashio/css/style-responsive.css') }}" rel="stylesheet">
  <script src="{{ asset('dashio/lib/chart-master/Chart.js') }}"></script>

  @stack('pay-scripts')
  @stack('date-picker-head')

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
  <style>
    
  </style>
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>DASH<span>IO</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        
        <!--  notification end -->
      </div>
      <form action="{{ route('logout') }}" method="POST" class="top-menu">
        @csrf
        <ul class="nav pull-right top-menu">
          <li><button class="logout" type="submit">Logout</button></li>
        </ul>
      </form>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="{{ asset('dashio/img/ui-sam.jpg') }}" class="img-circle" width="80"></a></p>
          <h5 class="centered">Administrator</h5>
          <li class="mt">
            <a class="{{ Route::is('admin.index') ? 'active' : '' }} link" href="{{ route('admin.index') }}">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="{{ request()->is('admin/pedagang') || request()->is('admin/retribusi') || request()->is('admin/sewa') || request()->is('admin/produk') || request()->is('admin/lapak') ? 'active' : '' }} link">
              <i class="fa fa-th-large"></i>
              <span>Data master</span>
              </a>
            <ul class="sub">
              <li class="{{ request()->is('admin/pedagang')||request()->is('admin/pedagang/*') ? 'active' : '' }}">
                <a href="{{ route('admin.pedagang.index') }}">Data pedagang</a>
              </li>
              <li class="{{ request()->is('admin/retribusi')||request()->is('admin/retribusi/*') ? 'active' : '' }}">
                <a href="{{ route('admin.retribusi.index') }}">Data retribusi</a>
              </li>
              <li class="{{ request()->is('admin/sewa') ? 'active' : '' }}">
                <a href="{{ route('admin.sewa.index') }}">Data sewa</a>
              </li>
              <li class="{{ request()->is('admin/produk')||request()->is('admin/produk/*') ? 'active' : '' }}">
                <a href="{{ route('admin.produk.index') }}">Data produk komoditas</a>
              </li>
              <li class="{{ request()->is('admin/lapak')||request()->is('admin/lapak/*') ? 'active' : '' }}">
                <a href="{{ route('admin.lapak.index') }}">Data lapak / kios</a>
              </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="{{ request()->is('admin/transaksi-sewa') || request()->is('admin/transaksi-retribusi') ? 'active' : '' }} link">
              <i class="fa fa-money"></i>
              <span>Data transaksi</span>
              </a>
            <ul class="sub">
              <li class="{{ request()->is('admin/transaksi-sewa') ? 'active' : '' }}">
                <a href="{{ route('admin.transaksi-sewa.index') }}">Pembayaran sewa</a>
              </li>
              <li class="{{ request()->is('admin/transaksi-retribusi') ? 'active' : '' }}">
                <a href="{{ route('admin.transaksi-retribusi.index') }}">Pembayaran retribusi</a>
              </li>
            </ul>
          </li>
          <li>
            <a class="{{ Route::is('admin.laporan') ? 'active' : '' }} link" href="{{ route('admin.laporan') }}">
              <i class="fa fa-list-alt"></i>
              <span>Laporan</span>
              </a>
          </li>
          <li>
            <a class="{{ Route::is('admin.artikel.index') ? 'active' : '' }} link" href="{{ route('admin.artikel.index') }}">
              <i class="fa fa-tasks"></i>
              <span>Artikel</span>
              </a>
          </li>
          {{-- <li>
            <a href="inbox.html">
              <i class="fa fa-envelope"></i>
              <span>Mail </span>
              <span class="label label-theme pull-right mail-info">2</span>
              </a>
          </li> --}}
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        @yield('content')
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer" style="position: fixed; width: 100%; bottom: 0; left: 0; z-index: -1;">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div>
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>

  @stack('pay-action-scripts')
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{ asset('dashio/lib/jquery/jquery.min.js') }}"></script>
  
  <script src="{{ asset('dashio/lib/bootstrap/js/bootstrap.min.js') }}"></script>
  <script class="include" type="text/javascript" src="{{ asset('dashio/lib/jquery.dcjqaccordion.2.7.js') }}"></script>
  <script src="{{ asset('dashio/lib/jquery.scrollTo.min.js') }}"></script>
  <script src="{{ asset('dashio/lib/jquery.nicescroll.js') }}" type="text/javascript"></script>
  <script src="{{ asset('dashio/lib/jquery.sparkline.js') }}"></script>
  <!--common script for all pages-->
  <script src="{{ asset('dashio/lib/common-scripts.js') }}"></script>
  <script type="text/javascript" src="{{ asset('dashio/lib/gritter/js/jquery.gritter.js') }}"></script>
  <script type="text/javascript" src="{{ asset('dashio/lib/gritter-conf.js') }}"></script>
  <!--script for this page-->
  <script src="{{ asset('dashio/lib/sparkline-chart.js') }}"></script>
  <script src="{{ asset('dashio/lib/zabuto_calendar.js') }}"></script>
  @stack('date-picker')
  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome to Dashio!',
        // (string | mandatory) the text inside the notification
        text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
        // (string | optional) the image to display on the left
        image: 'dashio/img/ui-sam.jpg',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>
