@extends('layouts.app')

@section('content')
<h3><i class="fa fa-angle-right"></i> Dashboard</h3>
    <div class="row">
      <div class="col-lg-9 main-chart">
        <!--CUSTOM CHART START -->
        <div class="border-head">
          <h3>Data pembayaran sewa</h3>
        </div>
        <div class="custom-bar-chart">
          <ul class="y-axis">
            <li><span>10</span></li>
            <li><span>8</span></li>
            <li><span>6</span></li>
            <li><span>4</span></li>
            <li><span>2</span></li>
            <li><span>0</span></li>
          </ul>
          <div class="bar">
            <div class="title">JAN</div>
            <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
          </div>
          <div class="bar ">
            <div class="title">FEB</div>
            <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
          </div>
          <div class="bar ">
            <div class="title">MAR</div>
            <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
          </div>
          <div class="bar ">
            <div class="title">APR</div>
            <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
          </div>
          <div class="bar">
            <div class="title">MAY</div>
            <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
          </div>
          <div class="bar ">
            <div class="title">JUN</div>
            <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
          </div>
          <div class="bar">
            <div class="title">JUL</div>
            <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 ds">
        <!--COMPLETED ACTIONS DONUTS CHART-->
        <div class="donut-main">
          <h4>COMPLETED ACTIONS & PROGRESS</h4>
          <canvas id="newchart" height="130" width="130"></canvas>
          <script>
            var doughnutData = [{
                value: 70,
                color: "#4ECDC4"
              },
              {
                value: 30,
                color: "#fdfdfd"
              }
            ];
            var myDoughnut = new Chart(document.getElementById("newchart").getContext("2d")).Doughnut(doughnutData);
          </script>
        </div>
        <!--NEW EARNING STATS -->
        <div class="panel terques-chart">
          <div class="panel-body">
            <div class="chart">
              <div class="centered">
                <span>EARNINGS</span>
                <strong>Rp {{ number_format($total,0,',','.') }}</strong>
              </div>
              <br>
              <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,564,455]"></div>
            </div>
          </div>
        </div>
        <!--new earning end-->
        
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
