@extends('layouts.app')

@section('content')
    <h3><i class="fa fa-angle-right"></i> Pembayaran</h3>
    <div class="row">
        <div class="col-md-9">
            <h4>{{ $pedagang->nama_lengkap }}</h4>
            <address>
            <strong>{{ $pedagang->email }}</strong><br>
            <abbr title="Phone">Hp:</abbr> {{ $pedagang->no_hp }}
            </address>
        </div>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th style="width:140px" class="text-center">Lama sewa</th>
            <th class="text-left">Deskripsi</th>
            <th style="width:140px" class="text-right">Harga sewa / bulan</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">{{ $sewa->periode }} bulan</td>
                <td>Penyewaan lapak dengan kode {{ $lapak->posisi }} dan ukuran luas dari lapak ini adalah {{ $lapak->luas }}. </td>
                <td class="text-right">Rp {{ $lapak->harga_sewa }} / bulan</td>
        </tbody>
    </table>
    <div class="form-send text-right">
        <button type="button" id="pay-button" class="btn btn-large btn-theme03">Lanjutkan pembayaran</button>
    </div>
@endsection
