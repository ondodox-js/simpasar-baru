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
				@foreach ($produks as $item)
				@php
					$item->harga_terbaru = number_format($item->harga_terbaru,0,',','.');
				@endphp
				<div class="col-md-3">
					<div class="service-item">
						<img src="assets/img/beras.png" alt="abcd" height="175" width="300">
						<center>
							<h4>{{ $item->nama_produk }}</h4>
							<p>Rp {{ $item->harga_terbaru }}</p>
						</center>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
@endsection