@extends('layouts.app')

@section('content')
    <h3><i class="fa fa-angle-right"></i> Detail Pedagang</h3>
    <form class="contact-form php-mail-form" role="form" action="/" method="get">
    @csrf
    @method('put')
    <div class="row mt">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <h4 class="title">Data pedagang</h4>
            <div id="message"></div>
            <div class="contact-form php-mail-form">
                @csrf
                <div class="form-group @error('nik') has-error @enderror">
                    <input type="text" name="nik" class="form-control" placeholder="Nomor Induk Kependudukan..." data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="{{ $pedagang->nik }}" readonly disabled>
                    @error('nik')
                        <p class="help-block">{{ $errors->first('nik') }}</p>
                    @enderror
                </div>
                <div class="form-group @error('namaLengkap')has-error @enderror">
                    <input type="text" name="namaLengkap" class="form-control" placeholder="Nama lengkap..." data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="{{ $pedagang->nama_lengkap }}" readonly disabled>
                    @error('namaLengkap')
                        <p class="help-block">{{ $errors->first('namaLengkap') }}</p>
                    @enderror
                    <div class="validate"></div>
                </div>
                <div class="form-group @error('noHp')has-error @enderror">
                    <input type="text" name="noHp" class="form-control" placeholder="(+62) ..." data-rule="number" data-msg="Please enter a valid email" value="{{ $pedagang->no_hp }}" readonly disabled>
                    @error('noHp')
                        <p class="help-block">{{ $errors->first('noHp') }}</p>
                    @enderror
                    <div class="validate"></div>
                </div>
                <div class="form-group @error('alamat')has-error @enderror">
                    <textarea class="form-control" name="alamat" placeholder="Alamat..." rows="5" data-rule="required" data-msg="Please write something for us" readonly disabled>{{ $pedagang->alamat }}</textarea>
                    @error('alamat')
                        <p class="help-block">{{ $errors->first('alamat') }}</p>
                    @enderror
                    <div class="validate"></div>
                </div>
                <div class="form-send">
                    <a href="{{ route('admin.pedagang.index') }}" class="btn btn-large btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </form>
    </div>
@endsection
