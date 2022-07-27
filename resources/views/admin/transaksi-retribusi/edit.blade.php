@extends('layouts.app')

@section('content')
    <h3><i class="fa fa-angle-right"></i> Perubahan Data Transaksi Sewa</h3>
    <div class="row mt">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <h4 class="title">Data transaksi</h4>
            <div id="message"></div>
            <form class="contact-form php-mail-form" role="form" action="{{ route('admin.transaksi-retribusi.update', $item) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <input type="text" name="idSewa" class="form-control" id="contact-email" placeholder="Posisi ..." data-rule="number" data-msg="Please enter a valid email" value="{{ $item->posisi }}" disabled>
                    <div class="validate"></div>
                </div>
                <div class="form-group @error('keterangan')has-error @enderror">
                    <textarea class="form-control" name="keterangan" placeholder="Keterangan..." rows="5" data-rule="required" data-msg="Please write something for us">{{ $item->keterangan }}</textarea>
                    @error('keterangan')
                        <p class="help-block">{{ $errors->first('keterangan') }}</p>
                    @enderror
                    <div class="validate"></div>
                </div>
                <div class="form-group @error('jumlahPeriode')has-error @enderror">
                    <input type="number" name="jumlahPeriode" class="form-control" id="contact-email" placeholder="Jumlah periode ..." data-rule="number" data-msg="Please enter a valid email" value="{{ $item->jumlah_periode }}">
                    <div class="validate"></div>
                    @error('jumlahPeriode')
                        <p class="help-block">{{ $errors->first('jumlahPeriode') }}</p>
                    @enderror
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
