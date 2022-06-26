@extends('layouts.user')

@section('content')
<section class="page-top-section set-bg" data-setbg="assets/img/page-top-bg/2.jpg">
    <div class="container">
        <h2>Loans</h2>
        <nav class="site-breadcrumb">
            <a class="sb-item" href="#">Home</a>
            <span class="sb-item active">Loans</span>
        </nav>
    </div>
</section>
<!-- Page top Section end -->

<!-- Loans Section end -->
<section class="loans-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="assets/img/loans.jpg" alt="">
            </div>
            <div class="col-lg-6">
                <div class="loans-text">
                    <h2>Our Personal Loan is now available online</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tem por incididunt ut labore et dolore mag na aliqua.  Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse potenti. Ut gravida mattis magna, non varius lorem sodales nec. </p>
                    <ul>
                        <li>Class aptent taciti sociosqu ad litora torqu</li>
                        <li>Torquent per conubia nostra, per inceptos himenaeos.  </li>
                        <li>Suspendisse potenti. Ut gravida mattis magna</li>
                    </ul>
                    <a href="#" class="site-btn">apply right now!</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Loans Section end -->

<!-- Loans calculator Section  -->
<section class="loans-calculator-section spad">
    <div class="container">
        <div class="text-center text-white mb-5 pb-3">
            <h2>How much do you want to borrow?</h2>
        </div>
        <div class="loans-calculator">
            <div id="lc-dec" class="lc-control-btn">-</div>
            <div id="lc-inc" class="lc-control-btn ici">+</div>
            <div class="slider-input-warp">
                <div id="slider-range-max" class="slider">
                    <div class="ui-slider-handle"><span id="loan-value">$1000</span></div>
                </div>
            </div>
            <div class="calculator-scale">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="lone-values">
                <div class="lone-value">$1000</div>
                <div class="lone-value lv-step">$10.000</div>
            </div>
            <div class="ls-result">Weekly payments: <span id="lone-emi">$19</span></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tem por incididunt ut labore et dolore mag na aliqua.  Class aptent taciti sociosqu ad litora torquent per conubia sed do eiusmod tem por incididun.</p>
            <div class="text-center">
                <a href="#" class="site-btn mr-0 mr-sm-2 mt-4">apply right now!</a>
                <a href="#" class="site-btn sb-dark mt-4">see other loans</a>
            </div>
        </div>
    </div>
</section>
<!-- Loans calculator Section end -->

<!-- Services Section -->
<section class="services-section">
    <div class="container">
        <div class="text-center mb-5 pb-3">
            <h2>What loan may suit you</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="service-item">
                    <img src="img/loans/1.jpg" alt="">
                    <h4>Wedding Loan</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tem por incididunt ut labore et dolore mag na aliqua.  Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse potenti. </p>
                    <a href="#" class="readmore">Apply for a loan now <img src="assets/img/arrow.png" alt=""></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item">
                    <img src="img/loans/2.jpg" alt="">
                    <h4>Home Loan</h4>
                    <p>Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tem por incididunt ut labore et dolore mag na aliqua.  Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse potenti. </p>
                    <a href="#" class="readmore">Apply for a loan now <img src="assets/img/arrow.png" alt=""></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item">
                    <img src="img/loans/1.jpg" alt="">
                    <h4>Holliday Loan</h4>
                    <p> Class aptent it amet, consectetur adipiscing elit, sed do eiusmod tem por incididunt ut labore et dolore mag na aliqua.  Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse potenti.</p>
                    <a href="#" class="readmore">Apply for a loan now <img src="assets/img/arrow.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section end -->

<!-- Score Section end -->
<section class="score-section text-white set-bg" data-setbg="assets/img/score-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-8">
                <h2>Calculate my Score</h2>
                <h4>Check your credit reports as often as you want, it won't affect your scores.</h4>
                <a href="#" class="site-btn sb-big">show my score</a>
            </div>
        </div>
        <img src="assets/img/hand.png" alt="" class="hand-img">
    </div>
</section>
<!-- Score Section end -->
@endsection