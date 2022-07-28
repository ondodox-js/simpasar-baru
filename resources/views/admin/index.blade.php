@extends('layouts.app')

@section('content')
<h3><i class="fa fa-angle-right"></i> Dashboard</h3>
    <div class="row">
      <div class="col-lg-12 main-chart">
        <!--CUSTOM CHART START -->
        <div class="border-head">
          <h3>Data pendapatan retribusi tahun ini</h3>
        </div>
        <div class="custom-bar-chart">
          <ul class="y-axis">
            <li><span>Rp10jt</span></li>
            <li><span>Rp8jt</span></li>
            <li><span>Rp6jt</span></li>
            <li><span>Rp4jt</span></li>
            <li><span>Rp2jt</span></li>
            <li><span>0</span></li>
          </ul>
          @for ($i = 1; $i <= 12; $i++)
            @php
              $month_name = date('F', mktime(0, 0, 0, $i, 10));
              $persentase = 0;
              if(isset($retribusi->$i)){
                $persentase = $retribusi->$i / 10000000 * 100;
              }
            @endphp
              <div class="bar" style="width: 4%; margin: 0 2%">
                <div class="title">{{ $month_name }}</div>
                <div class="value tooltips" data-original-title="{{ isset($retribusi->$i) ? 'Rp ' . number_format($retribusi->$i,0,',','.') : 0 }}" data-toggle="tooltip" data-placement="top">{{ $persentase }}%</div>
              </div>
          @endfor
          
        </div>
      </div>
    </div>
    <div class="row mt">
      @if (count($sewas) > 0)
      <div class="col-md-12">
        <div class="content-panel">
            <h4><i class="fa fa-angle-right"></i> Daftar penyewa</h4>
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
                  <form action="{{ route('admin.pedagang.destroy', ['id' => $sewa->id_sewa]) }}" method="post">
                    @csrf
                    @method('delete')
                    @php
                        $tanggal_sewa = date('Y-m-d', strtotime($sewa->tanggal_sewa));

                        $date_time = '+'. $sewa->periode . ' month';
                        $akhir_sewa = date('Y-m-d', strtotime($date_time, strtotime($sewa->tanggal_sewa)));
                    @endphp 
                    <tr>
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
                  </form>
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
