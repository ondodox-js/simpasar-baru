@extends('layouts.app')

@section('content')
    <h3><i class="fa fa-angle-right"></i> Penambahan Data Pedagang Baru</h3>
    <form class="contact-form php-mail-form" role="form" action="{{ route('admin.pedagang.store') }}" method="POST">
    @csrf
    <div class="row mt">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <h4 class="title">Data pedagang</h4>
            <div id="message"></div>
            <div class="contact-form php-mail-form">
                @csrf
                <div class="form-group @error('nik') has-error @enderror">
                    <input type="text" name="nik" class="form-control" placeholder="Nomor Induk Kependudukan..." data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="{{ old('nik') }}">
                    @error('nik')
                        <p class="help-block">{{ $errors->first('nik') }}</p>
                    @enderror
                </div>
                <div class="form-group @error('namaLengkap')has-error @enderror">
                    <input type="text" name="namaLengkap" class="form-control" placeholder="Nama lengkap..." data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="{{ old('namaLengkap') }}">
                    @error('namaLengkap')
                        <p class="help-block">{{ $errors->first('namaLengkap') }}</p>
                    @enderror
                    <div class="validate"></div>
                </div>
                <div class="form-group @error('noHp')has-error @enderror">
                    <input type="text" name="noHp" class="form-control" placeholder="(+62) ..." data-rule="number" data-msg="Please enter a valid email" value="{{ old('noHp') }}">
                    @error('noHp')
                        <p class="help-block">{{ $errors->first('noHp') }}</p>
                    @enderror
                    <div class="validate"></div>
                </div>
                <div class="form-group @error('alamat')has-error @enderror">
                    <textarea class="form-control" name="alamat" placeholder="Alamat..." rows="5" data-rule="required" data-msg="Please write something for us">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <p class="help-block">{{ $errors->first('alamat') }}</p>
                    @enderror
                    <div class="validate"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <h4 class="title">Data sewa</h4>
            <div id="message"></div>
            <div class="form-group @error('idLapak')has-error @enderror">
                <select class="form-control" name="idLapak">
                    <option selected disabled>Lapak atau kios :</option>
                    @foreach ($lapaks as $lapak)
                    <option value="{{ $lapak->id_lapak }}">{{ $lapak->posisi }} - {{ $lapak->luas }} m³ - Rp. {{ $lapak->harga_sewa }} / bulan</option>
                    @endforeach
                </select>
                @error('idLapak')
                        <p class="help-block">{{ $errors->first('idLapak') }}</p>
                @enderror
            </div>

            <div class="loading"></div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>

            <div class="form-send">
                <button type="submit" class="btn btn-large btn-primary">Berikutnya</button>
            </div>

                <!-- contact_details -->
        </div>
    </form>
    </div>
@endsection
