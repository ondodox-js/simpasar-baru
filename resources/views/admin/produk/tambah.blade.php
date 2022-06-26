@extends('layouts.app')

@section('content')
    <h3><i class="fa fa-angle-right"></i> Penambahan Produk Komoditas Pokok</h3>
    <div class="row mt">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <h4 class="title">Data produk</h4>
            <div id="message"></div>
            <form class="contact-form php-mail-form" role="form" action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" name="namaProduk" class="form-control" id="contact-name" placeholder="Nama produk..." data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <input type="number" name="hargaProduk" class="form-control" id="contact-email" placeholder="Rp. -" data-rule="number" data-msg="Please enter a valid email">
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <input name="urlGambar" type="file" class="default">
                </div>
                                  
                <div class="loading"></div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>

                <div class="form-send">
                    <button type="submit" class="btn btn-large btn-primary">Berikutnya</button>
                </div>

            </form>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <h4 class="title">Contact Details</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry"s standard dummy text ever since the 1500s. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <ul class="contact_details">
                <li><i class="fa fa-envelope-o"></i> info@yoursite.com</li>
                <li><i class="fa fa-phone-square"></i> +34 5565 6555</li>
                <li><i class="fa fa-home"></i> Some Fine Address, 887, Madrid, Spain.</li>
            </ul>
            <!-- contact_details -->
        </div>
    </div>
@endsection
