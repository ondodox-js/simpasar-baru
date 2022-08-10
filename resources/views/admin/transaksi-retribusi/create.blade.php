@extends('layouts.app')

@section('content')
    <h3><i class="fa fa-angle-right"></i> Penambahan Data Transaksi Retribusi</h3>
    <div class="row mt">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <h4 class="title">Data transaksi</h4>
            <div id="message"></div>
            <form class="contact-form php-mail-form" role="form" action="{{ route('admin.transaksi-retribusi.after-create') }}" method="POST">
                @csrf
                <div class="form-group @error('idSewa')has-error @enderror">
                    <select class="form-control" name="idSewa">
                        <option selected disabled>Sewa :</option>
                        @foreach ($sewas as $sewa)
                        <option value="{{ $sewa->id_sewa }}">{{ $sewa->joinLapakNonStatic()->posisi }} - {{ $sewa->joinLapakNonStatic()->luas }} m³ - {{ $sewa->interval + 1 }} bulan</option>
                        @endforeach
                    </select>
                    @error('idsewas')
                            <p class="help-block">{{ $errors->first('idSewa') }}</p>
                    @enderror
                </div>
                <div class="form-group @error('keterangan')has-error @enderror">
                    <textarea class="form-control" name="keterangan" placeholder="Keterangan..." rows="5" data-rule="required" data-msg="Please write something for us">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <p class="help-block">{{ $errors->first('keterangan') }}</p>
                    @enderror
                    <div class="validate"></div>
                </div>
                @if (Session::has('message'))
                    <div class="login-wrap centered has-error">
                        <p>{{ Session::get('message') }}</p>
                    </div>   
                @endif

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
