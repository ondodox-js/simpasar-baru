@extends('layouts.app')

@section('content')
<h3><i class="fa fa-angle-right"></i> Data Lapak atau Kios</h3>
    <div class="row">
        @if (count($lapaks) > 0)
        <div class="col-md-12">
          <div class="text-right mb">
            <a href="{{ route('admin.lapak.tambah') }}" class="btn btn-theme">Lapak baru</a>
          </div>
          <div class="content-panel">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Golongan</th>
                    <th>Posisi</th>
                    <th>Luas</th>
                    <th>Harga sewa / bulan</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($lapaks as $lapak)
                  <form action="{{ route('admin.lapak.destroy', ['id' => $lapak->id_lapak]) }}" method="post">
                    @csrf
                    @method('delete')
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>Kelas {{ $lapak->kelas }}</td>
                      <td>{{ $lapak->posisi }}</td>
                      <td>{{ $lapak->luas }} m</td>
                      <td>Rp {{ number_format($lapak->harga_sewa,0,',','.') }}</td>
                      <td>{{ $lapak->status ? 'Tersedia' : 'Disewakan' }}</td>
                      <td>
                        <a href="{{ route('admin.lapak.edit', ['id' => $lapak->id_lapak]) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus {{ $lapak->posisi }} ?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
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
          <h3>Data lapak atau kios belum ada!</h3>
          <a href="{{ route('admin.lapak.tambah') }}" class="btn btn-theme">Lapak baru</a>
        </div>
        @endif
    </div>
@endsection
