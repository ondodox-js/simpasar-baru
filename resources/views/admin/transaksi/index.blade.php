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
                  <th>Judul</th>
                  <th>Link</th>
                  <th>Deskripsi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pemesanans as $pemesanan)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pemesanan->kode_pembayaran }}</td>
                    <td>{{ $pemesanan->jumlah_bayar }}</td>
                    <td>{{ date($pemesanan->tanggal_transaksi) }}</td>
                    <td>
                      @if (!$pemesanan->status)
                        <span class="label label-danger pull-right">pending</span>
                      @else
                        <span class="label label-success pull-right">success</span>             
                      @endif
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
