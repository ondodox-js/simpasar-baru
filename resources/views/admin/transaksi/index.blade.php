@extends('layouts.app')

@section('content')
<h3><i class="fa fa-angle-right"></i> Pemesanan</h3>
    <div class="row">
      @if (count($pemesanans) > 0)
      <div class="col-md-12">
        <div class="content-panel">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kode pembayaran</th>
                  <th>Nama penyewa</th>
                  <th>Nomor lapak</th>
                  <th>Jumlah bayar</th>
                  <th>Tanggal pemesanan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pemesanans as $pemesanan)
                  @php
                    $label_class = $pemesanan->status ? 'label-success' : 'label-danger'    
                  @endphp
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pemesanan->kode_pembayaran }}</td>
                    <td>{{ $pemesanan->nama_lengkap }}</td>
                    <td>{{ $pemesanan->posisi }}</td>
                    <td>{{ $pemesanan->jumlah_bayar }}</td>
                    <td>{{ date($pemesanan->tanggal_transaksi) }}</td>
                    <td class="text-center">
                        <span class="label {{ $label_class }} pull-right">{{ $pemesanan->keterangan }}</span>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>  
      @else
      <div class="col-md-12 text-center">
        <h3>Tidak ada pemesansn hari ini!</h3>
      </div>
      @endif
      
    </div>
@endsection
