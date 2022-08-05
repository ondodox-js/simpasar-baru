@extends('layouts.app')

@section('content')
    <h3><i class="fa fa-angle-right"></i> Penambahan Lapak atau Kios Baru</h3>
    <div class="row mt">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <h4 class="title">Data lapak</h4>
            <div id="message"></div>
            <form class="contact-form php-mail-form" role="form" action="{{ route('admin.lapak.store') }}" method="POST">
                @csrf
                <div class="form-group @error('idretribusi')has-error @enderror">
                    <select class="form-control" name="idRetribusi">
                        <option selected disabled>Kelas :</option>
                        @foreach ($retribusis as $retribusi)
                        <option value="{{ $retribusi->id_retribusi }}">{{ $retribusi->kelas }} - Rp. {{ $retribusi->harga_m }} ³/ hari</option>
                        @endforeach
                    </select>
                    @error('idretribusis')
                            <p class="help-block">{{ $errors->first('idretribusi') }}</p>
                    @enderror
                </div>
                <div class="form-group @error('posisi')has-error @enderror">
                    <input type="text" name="posisi" class="form-control" id="contact-name" placeholder="Posisi..." data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="{{ old('posisi') }}">
                    <div class="validate"></div>
                    @error('posisi')
                        <p class="help-block">{{ $errors->first('posisi') }}</p>
                    @enderror
                </div>
                <div class="form-group @error('luas')has-error @enderror">
                    <input type="number" name="luas" class="form-control" id="contact-email" placeholder="- m³" data-rule="number" data-msg="Please enter a valid email" value="{{ old('luas') }}">
                    <div class="validate"></div>
                    @error('luas')
                        <p class="help-block">{{ $errors->first('luas') }}</p>
                    @enderror
                </div>
                <div class="form-group @error('harga')has-error @enderror">
                    <input type="number" name="harga" class="form-control" id="contact-email" placeholder="Rp. - / bulan" data-rule="number" data-msg="Please enter a valid email" value="{{ old('harga') }}">
                    <div class="validate"></div>
                    @error('harga')
                        <p class="help-block">{{ $errors->first('harga') }}</p>
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
