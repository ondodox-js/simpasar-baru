@extends('layouts.user')

@section('content')
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hs-text">
                    <h2>Sudah Belanja ?</h2>
                    <p>Ditengah Pandemi seperti ini, anda harus pintar dalam memilih bahan makanan. Pasar Banjar Hadir dengan penerapan Protokol Kesehatan Sesuai dengan anjuran Pemerintah</p>
                    <a href="#" class="site-btn sb-dark">Find out more</a>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="assets/img/hero-slider/1.jpg"></div>
        <div class="hs-item set-bg" data-setbg="assets/img/hero-slider/2.jpg"></div>
        <div class="hs-item set-bg" data-setbg="assets/img/hero-slider/3.jpg"></div>
    </div>
</section>

<section class="feature-section spad">
    <div class="container">
        <div class="feature-item">
            <div class="row">
                <div class="col-lg-6">
                    <img src="assets/img/foto1-banjar.png" alt="">
                </div>
                <div class="col-lg-6">
                    <div class="feature-text">
                        <h2>Get a personal loan from just 8.5% APR</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tem por incididunt ut labore et dolore mag na aliqua.  Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse potenti. Ut gravida mattis magna, non varius lorem sodales nec. In libero orci, ornare non nisl.</p>
                        <a href="#" class="readmore">Apply for a loan now <img src="assets/img/arrow.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="feature-item">
            <div class="row">
                <div class="col-lg-6 order-lg-2">
                    <img src="assets/img/feature-2.jpg" alt="">
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="feature-text">
                        <h2>Get aproved in minutes after you apply online</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tem por incididunt ut labore et dolore mag na aliqua.  Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse potenti. Ut gravida mattis magna, non varius lorem sodales nec. In libero orci, ornare non nisl.</p>
                        <a href="#" class="readmore">Apply for a loan now <img src="assets/img/arrow.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection