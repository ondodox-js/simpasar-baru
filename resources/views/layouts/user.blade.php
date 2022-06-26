<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>SISTEM INFORMASI MANAJEMEN PASAR KOTA BANJAR</title>
	<meta charset="UTF-8">
	<meta name="description" content="loans HTML Template">
	<meta name="keywords" content="loans, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Favicon -->
	<link href="assets/img/favicon.ico" rel="shortcut icon"/>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
 
	<!-- Stylesheets -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="assets/css/flaticon.css"/>
	<link rel="stylesheet" href="assets/css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="assets/css/slicknav.min.css"/>

	<link rel="stylesheet" href="assets/css/style.css"/>



</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header Section -->
	<header class="header-section">
		<a href="{{ route('home') }}" class="site-logo">
		<img src="assets/img/logobanjar1.png" alt="" width="150" height="40">
		</a>
		<nav class="header-nav">
			<ul class="main-menu">
			<li><a href="{{ route('home') }}" class="{{ Route::is('home') ? 'active' : '' }}">Home</a></li>
				<li><a href="{{ route('tentang') }}" class="{{ Route::is('tentang') ? 'active' : '' }}">Tentang</a></li>
				<li><a href="{{ route('denah') }}" class="{{ Route::is('denah') ? 'active' : '' }}">Denah</a>
					<!-- <ul class="sub-menu">
						<li><a href="about-us.php">About Us</a></li>
						<li><a href="loans.php">Loans</a></li>
						<li><a href="elements.php">elements</a></li>
					</ul> -->
				</li>
				<li><a href="{{ route('dagangan') }}" class="{{Route::is('dagangan') ? 'active' : '' }}">Harga Barang Komoditas</a></li>
				<li><a href="{{ route('masuk') }}">Login</a></li>
			</ul>
			<div class="header-right">
				<a href="#" class="hr-btn"><i class="flaticon-029-telephone-1"></i>Call us now! </a>
				<div class="hr-btn hr-btn-2">+45 332 65767 42</div>
			</div>
		</nav>
	</header>
	<!-- Header Section end -->
    @yield('content')
    
	<footer class="footer-section">
		<div class="container">
			<!-- <a href="index.html" class="footer-logo">
				<img src="assets/img/logo.png" alt="">
			</a> -->
			<h4 style="color: red;">Pasar Kota Banjar Patroman</h4>
			<br><br>
			<div class="row">
				<div class="col-lg-5 col-sm-6">
					<div class="footer-widget">
						<h2>Industri</h2>
						<ul>
							<li><a href="#">KEGIATAN FASILITASI GMP (GOOD MANUFACTURING PRACTICES) PRODUK MAKANAN OLAHAN TAHUN ANGGARAN 2020 <i>28 Sep 2020</i></a></li>
							<li><a href="#">KEGIATAN PELATIHAN DESAIN KEMASAN TAHUN ANGGARAN 2020</a></li>
							<li><a href="#">KEGIATAN PELATIHAN DESAIN KEMASAN TAHUN ANGGARAN 2019</a></li>
							<li><a href="#">Innovative Finance ISA</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="footer-widget">
						<h2>Perdagangan</h2>
						<ul>
							<li><a href="#">PASAR RAKYAT ONLINE TAHUN 2020/1441 H</a></li>
							<li><a href="#">Cukup Diam Di Rumah Belanja Lewat Online</a></li>
							<li><a href="#">Penyediaan Sarana Cuci Tangan di Pasar Tradisional Kota Banjar</a></li>
							<li><a href="#">Sidak Tim Satgas Pangan ke Pasar Banjar</a></li>
							
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget">
						<h2>Koperasi dan UMKM</h2>
						<ul>
							<li><a href="#">PERINGATAN HARI KOPERASI KE – 72 TINGKAT KOTA BANJAR</a></li>
							<li><a href="#">KEGIATAN PELATIHAN KEAMANAN PANGAN BAGI UMKM OLAHAN MAKANAN</a></li>
							<li><a href="#">SELEKSI TENAGA PENDAMPING KOPERASI USAHA MIKRO KECIL DAN MENENGAH KOTA BANJAR TAHUN ANGGARAN 2019 </a></li>
							
						</ul>
					</div>
				</div>
				
			</div>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tem por incididunt ut labore et dolore mag na aliqua.  Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse potenti. Ut gravida mattis magna, non varius lorem sodales nec. In libero orci, ornare non nisl.</p>
			<div class="copyright">
				Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
				</div>
			</div>
	</footer>
	<!-- Footer Section end -->
	
	<!--====== Javascripts & Jquery ======-->
	<script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.slicknav.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/jquery-ui.min.js"></script>
	<script src="assets/js/main.js"></script>

	</body>
</html>
