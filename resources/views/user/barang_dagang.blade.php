@extends('layouts/user')

@section('content')
	<!-- Page top Section end -->
	<section class="page-top-section set-bg" data-setbg="assets/img/page-top-bg/2.jpg">
		<div class="container">
			<h2>Harga Barang Komoditas</h2>
			<nav class="site-breadcrumb">
				<a class="sb-item" href="#">Home</a>
				<span class="sb-item active">Barang Komoditi</span>
			</nav>
		</div>
	</section>
	<section class="services-section">
		<div class="container">
			<div class="text-center mb-5 pb-3">
				<h2>Harga Komoditi Per <?php echo 'Tanggal : ' . date('d F, Y');?></h2>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="service-item">
						<img src="assets/img/beras.png" alt="abcd" height="175" width="300">
						<center>
							<h4>Beras Premium</h4>
							<p>Rp 10.000</p>
						</center>
					</div>
				</div>
				<div class="col-md-3">
					<div class="service-item">
						<img src="assets/img/cabai.jpg" alt="" height="175" width="300">
						<center>
							<h4>Cabai</h4>
							<p>Rp 10.000</p>
						</center>
					</div>
				</div>
				<div class="col-md-3">
					<div class="service-item">
						<img src="assets/img/bawang putih.jpg" alt="" height="175" width="300">
						<center>
							<h4>Bawang Putih</h4>
							<p>Rp 10.000</p>
						</center>
					</div>
				</div>
				<div class="col-md-3">
					<div class="service-item">
						<img src="assets/img/bawang merah.jpg" alt="" height="175" width="300">
						<center>
							<h4>Bawang merah</h4>
							<p>Rp 10.000</p>
						</center>
					</div>
				</div>
				<div class="col-md-3">
					<div class="service-item">
						<img src="assets/img/tomat3.png" alt="" height="175" width="300">
						<center>
							<h4>Tomat</h4>
							<p>Rp 10.000</p>
						</center>
					</div>
				</div>
				<div class="col-md-3">
					<div class="service-item">
						<img src="assets/img/daging ayam.jpg" alt="" height="175" width="300">
						<center>
							<h4>Daging Ayam </h4>
							<p>Rp 10.000</p>
						</center>
					</div>
				</div>
				<div class="col-md-3">
					<div class="service-item">
						<img src="assets/img/daging sapi.jpg" alt="" height="175" width="300">
						<center>
							<h4>Daging Sapi</h4>
							<p>Rp 10.000</p>
						</center>
					</div>
				</div>
				<div class="col-md-3">
					<div class="service-item">
						<img src="assets/img/telur.jpg" alt="" height="175" width="300">
						<center>
							<h4>Telur Ayam</h4>
							<p>Rp 10.000</p>
						</center>
					</div>
				</div>
				<div class="col-md-3">
					<div class="service-item">
						<img src="assets/img/telur ayam kampung.jpg" alt="" height="175" width="300">
						<center>
							<h4>Telur Ayam Kampung</h4>
							<p>Rp 10.000</p>
						</center>
					</div>
				</div>
				<div class="col-md-3">
					<div class="service-item">
						<img src="assets/img/gula pasir.jpg" alt="" height="175" width="300">
						<center>
							<h4>Gula Pasir</h4>
							<p>Rp 10.000</p>
						</center>
					</div>
				</div>
				<div class="col-md-3">
					<div class="service-item">
						<img src="assets/img/minyak goreng.jpg" alt="" height="175" width="300">
						<center>
							<h4>Minyak Goreng</h4>
							<p>Rp 10.000</p>
						</center>
					</div>
				</div>
				<div class="col-md-3">
					<div class="service-item">
						<img src="assets/img/tepung terigu.jpg" alt="" height="175" width="300">
						<center>
							<h4>Tepung Terigu</h4>
							<p>Rp 10.000</p>
						</center>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection