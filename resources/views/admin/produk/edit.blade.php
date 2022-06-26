@extends('layouts.app')

@section('content')
    <h3><i class="fa fa-angle-right"></i> Pembaaruan Data Produk Komoditas Pokok</h3>
    <div class="row mt">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <h4 class="title">Data produk</h4>
            <div id="message"></div>
            <form class="contact-form php-mail-form" role="form" action="{{ route('admin.produk.update', ['id' => $produk->id_produk]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="text" name="namaProduk" class="form-control" value="{{ $produk->nama_produk }}" placeholder="Nama produk..." data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <input type="number" name="hargaProdukLama" class="form-control" value="{{ $produk->harga_terbaru }}" placeholder="Rp. -" data-rule="number" data-msg="Please enter a valid email" readonly>
                    <div class="validate"></div>
                </div>

                <div class="form-group">
                    <input type="number" name="hargaProdukBaru" class="form-control" placeholder="Rp. - | (harga terbaru...)" data-rule="number" data-msg="Please enter a valid email">
                    <div class="validate">silahkan kosongkan jika tidak ada perubahan harga.</div>
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
