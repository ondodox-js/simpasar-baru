@extends('layouts.pedagang')
@section('content')
<h3><i class="fa fa-angle-right"></i> Data Lapak atau Kios yang di sewa</h3>
    <div class="row">
        @if (1 > 0)
        <div class="col-md-12">
          <div class="content-panel">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Posisi</th>
                    <th>Luas</th>
                    <th>Mulai sewa</th>
                    <th>Akhir sewa</th>
                    <th>Pembayaran bulan ini</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($lapaks as $item)
                  @php
                    $tanggal_sewa = date('Y-m-d', strtotime($item->tanggal_sewa));

                    $date_time = '+'. $item->periode . ' month';
                    $akhir_sewa = date('Y-m-d', strtotime($date_time, strtotime($item->tanggal_sewa)));
                  @endphp 
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->posisi }}</td>
                      <td>{{ $item->luas }} cm</td>
                      <td>{{ $tanggal_sewa }}</td>
                      <td>{{ $akhir_sewa }}</td>
                      <td>Sudah bayar</td>
                      <td>
                        <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                        <a href="#" class="btn btn-primary btn-xs">
                          Bayar sewa
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
        </div>
        @else
        <div class="col-md-12 text-center">
          <h3>Tidak ada lapak atau kios yang disewa!</h3>
        </div>
        @endif
    </div>
@endsection
