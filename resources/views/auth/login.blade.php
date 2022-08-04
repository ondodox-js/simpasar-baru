<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>SIMPASAR - Masuk</title>

  <!-- Favicons -->
  <link href="{{ asset('dashio/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('dashio/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('dashio/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!--external css-->
  <link href="{{ asset('dashio/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{ asset('dashio/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('dashio/css/style-responsive.css') }}" rel="stylesheet">
  <style>
    .has-error{
      color: red;
    }
  </style>
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="{{ route('auth-admin') }}" method="POST">
        @csrf
        <h2 class="form-login-heading">sign in now</h2>
        <div class="login-wrap @error('namaPengguna') has-error @enderror">
          <input type="text" class="form-control" placeholder="Nama pengguna ..." autofocus required name="namaPengguna">
          @error('namaPengguna')
            <p class="help-block">{{ $errors->first('namaPengguna') }}</p>
          @enderror
        </div>
        <div class="login-wrap @error('kataSandi') has-error @enderror">
          <input type="password" class="form-control" placeholder="Kata sandi ..." required name="kataSandi">
          @error('kataSandi')
            <p class="help-block">{{ $errors->first('kataSandi') }}</p>
          @enderror
        </div>
        <div class="login-wrap">
          <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
        </div>
        @if (Session::has('message'))
          <div class="login-wrap centered has-error">
            <p>{{ Session::get('message') }}</p>
          </div>   
        @endif
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{ asset('dashio/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('dashio/lib/bootstrap/js/bootstrap.min.js') }}"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="{{ asset('dashio/lib/jquery.backstretch.min.js') }}"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
