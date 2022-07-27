@extends('layouts.app')

@section('content')
<h3><i class="fa fa-angle-right"></i> Data Penyewa Terdaftar</h3>
    <div class="row">
      @if (count($sewas) > 0)
      <div class="col-md-12">
          <div class="content-panel">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nomor lapak atau kios</th>
                    <th>Nama pedagang</th>
                    <th>Lama sewa</th>
                    <th>Mulai sewa</th>
                    <th>Akhir sewa</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($sewas as $sewa)
                  
                    @php
                        $tanggal_sewa = date('Y-m-d', strtotime($sewa->tanggal_sewa));

                        $date_time = '+'. $sewa->periode . ' month';
                        $akhir_sewa = date('Y-m-d', strtotime($date_time, strtotime($sewa->tanggal_sewa)));
                    @endphp 
                    <tr>
                      <td>
                        <form action="{{ route('admin.sewa.destroy', ['id' => $sewa->id_sewa]) }}" method="POST">
                          @csrf
                          @method('delete')
                        <button type="submit" onclick="return confirm('Yakin berhenti menyewa ?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
                      </form>

                      </td>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $sewa->posisi }}</td>
                      <td>{{ $sewa->nama_lengkap }}</td>
                      <td>{{ $sewa->periode }} bulan</td>
                      <td>{{ $tanggal_sewa }}</td>
                      <td>{{ $akhir_sewa }}</td>
                      <td class="text-center">
                        @if ($sewa->aktif)
                          <span class="label label-success pull-right">Aktif</span>
                        @else
                          <span class="label label-danger pull-right">Silahkan melakukan pemanjangan sewa</span>             
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
        <h3>Penyewa belum ada!</h3>
      </div>       
      @endif
    </div>
@endsection
