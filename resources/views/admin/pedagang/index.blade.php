@extends('layouts.app')

@section('content')
<h3><i class="fa fa-angle-right"></i> Data Pedagang Terdaftar</h3>
    <div class="row">
      @if (count($pedagangs) > 0)
      <div class="col-md-12">
          <div class="text-right mb">
            <a href="{{ route('admin.pedagang.tambah') }}" class="btn btn-theme">Pedagang baru</a>
          </div>
          <div class="content-panel">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>NIK</th>
                    <th>Nama lengkap</th>
                    <th>No handphone</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pedagangs as $pedagang)
                  <form action="{{ route('admin.pedagang.destroy', ['id' => $pedagang->id_pedagang]) }}" method="post">
                    @csrf
                    @method('delete')
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $pedagang->nik }}</td>
                      <td>{{ $pedagang->nama_lengkap }}</td>
                      <td>{{ $pedagang->no_hp }}</td>
                      <td>
                        <button class="btn btn-success btn-xs"><i class="fa fa-eye"></i></button>
                        <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
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
        <h3>Data pedagang belum ada!</h3>
        <a href="{{ route('admin.pedagang.tambah') }}" class="btn btn-theme">Pedagang baru</a>
      </div>
      @endif
    </div>
@endsection
