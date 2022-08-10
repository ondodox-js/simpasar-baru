@extends('layouts.app')

@push('css-data_table')
  <link href="{{ asset('DataTables/datatables.min.css') }}" rel="stylesheet">
@endpush
@push('js-data_table')
<script src="{{ asset('DataTables/datatables.min.js') }}"></script>
<script>
  $(document).ready( function () {
    $('#table-belum-bayar').DataTable();
    setInterval(() => {
      $('#date-now').text(new Date().toLocaleString('id'));
  
    }, 1000);
  });

  
</script>
@endpush
    
@section('content')
<h3><i class="fa fa-angle-right"></i> Data Transaksi Retribusi</h3>
    <div class="row">
        @if (count($items) > 0)
        <div class="col-md-12">
          <div class="text-right mb">
            <a href="{{ route('admin.transaksi-retribusi.create') }}" class="btn btn-theme @if (count($b_retribusi) < 1) disabled @endif">
              @if (count($b_retribusi) > 0)
                  Transaksi baru
              @else
                  Tidak ada yang terlambat
              @endif
            </a>
          </div>
          <div class="content-panel">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama pedagang</th>
                    <th>Posisi</th>
                    <th>Jumlah bayar</th>
                    <th>Keterangan</th>
                    <th>Waktu transaksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                  <form action="{{ route('admin.transaksi-retribusi.destroy', $item) }}" method="post">
                    @csrf
                    @method('delete')
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->nama_lengkap }}</td>
                      <td>{{ $item->posisi }}</td>
                      <td>Rp {{ number_format($item->jumlah_bayar,0,',','.') }}</td>
                      <td>{{ $item->keterangan }}</td>
                      <td>{{ date('d-m-Y H:i:s', strtotime($item->tanggal_transaksi))}}</td>
                      <td>
                        <a href="{{ route('admin.transaksi-retribusi.edit', $item) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus transaksi ini ?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
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
          <h3>Data transaksi belum ada!</h3>
          <a href="{{ route('admin.transaksi-retribusi.create') }}" class="btn btn-theme">Transaksi baru</a>
        </div>
        @endif
    </div>
    <div class="row mt">
      @if (count($b_retribusi) > 0)
      <div class="col-md-12">
        <div class="content-panel">
            <h4><i class="fa fa-angle-right"></i> Daftar belum bayar retribusi pada <span id="date-now"></span></h4>
              <table class="table" id="table-belum-bayar">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nomor lapak atau kios</th>
                    <th>Nama pedagang</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($b_retribusi as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->joinLapakNonStatic()->posisi }}</td>
                      <td>{{ $item->joinPedagangNonStatic()->nama_lengkap }}</td>
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
