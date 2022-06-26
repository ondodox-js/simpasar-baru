@extends('layouts.app')

@section('content')
    <h3><i class="fa fa-angle-right"></i> Penambahan Artikel Baru</h3>
    <form class="contact-form php-mail-form" role="form" action="{{ route('admin.artikel.store') }}" method="POST">
    @csrf
    <div class="row mt">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <h4 class="title">Artikel</h4>
            <div id="message"></div>
            <div class="contact-form php-mail-form">
                @csrf
                <div class="form-group">
                    <input type="text" name="judul" class="form-control" placeholder="Judul..." data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <input type="text" name="link" class="form-control" placeholder="Link artikel..." data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="deskripsi" placeholder="Deskripsi..." rows="5" data-rule="required" data-msg="Please write something for us"></textarea>
                    <div class="validate"></div>
                </div>
                <div class="form-send">
                    <button type="submit" class="btn btn-large btn-primary">Berikutnya</button>
                </div>
            </div>
        </div>
    </form>
    </div>
@endsection
