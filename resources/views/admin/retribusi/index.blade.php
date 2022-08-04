@extends('layouts.app')

@section('content')
<h3><i class="fa fa-angle-right"></i> Data Retribusi Terdaftar</h3>
    <div class="row">
      @if (count($retribusis) > 0)
      <div class="col-md-12">
          <div class="text-right mb">
            <a href="{{ route('admin.retribusi.tambah') }}" class="btn btn-theme">Retribusi baru</a>
          </div>
          <div class="content-panel">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Layanan</th>
                    <th>Biaya awal</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($retribusis as $retribusi)
                  <form action="{{ route('admin.retribusi.destroy', ['id' => $retribusi->id_retribusi]) }}" method="post">
                    @csrf
                    @method('delete')
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $retribusi->layanan }}</td>
                      <td>Rp {{ number_format($retribusi->biaya,0,',','.') }}</td>
                      <td>
                        <a href="{{ route('admin.retribusi.edit', ['id' => $retribusi->id_retribusi]) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus {{ $retribusi->nama_lengkap }} ?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
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
        <h3>Data retribusi belum ada!</h3>
        <a href="{{ route('admin.retribusi.tambah') }}" class="btn btn-theme">retribusi baru</a>
      </div>
      @endif
    </div>
@endsection

