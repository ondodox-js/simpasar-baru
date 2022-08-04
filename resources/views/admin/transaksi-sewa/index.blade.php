@extends('layouts.app')

@section('content')
<h3><i class="fa fa-angle-right"></i> Data Transaksi Sewa</h3>
    <div class="row">
        @if (count($items) > 0)
        <div class="col-md-12">
          <div class="text-right mb">
            <a href="{{ route('admin.transaksi-sewa.create') }}" class="btn btn-theme">Transaksi baru</a>
          </div>
          <div class="content-panel">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Posisi</th>
                    <th>Jumlah bayar</th>
                    <th>Keterangan</th>
                    <th>Waktu transaksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                  <form action="{{ route('admin.transaksi-sewa.destroy', $item) }}" method="post">
                    @csrf
                    @method('delete')
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->posisi }}</td>
                      <td>Rp {{ number_format($item->jumlah_bayar,0,',','.') }}</td>
                      <td>{{ $item->keterangan }}</td>
                      <td>{{ date('d-m-Y H:i:s', strtotime($item->tanggal_transaksi))}}</td>
                      <td>
                        <a href="{{ route('admin.transaksi-sewa.edit', $item) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
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
          <a href="{{ route('admin.transaksi-sewa.create') }}" class="btn btn-theme">Transaksi baru</a>
        </div>
        @endif
    </div>
@endsection
