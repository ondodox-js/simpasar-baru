@extends('layouts.app')

@section('content')
<h3><i class="fa fa-angle-right"></i> Artikel belum tersedia</h3>
    <div class="row">
      @if (count($artikels) > 0)
      <div class="col-md-12">
        <div class="text-right mb">
          <a href="{{ route('admin.artikel.tambah') }}" class="btn btn-theme">Artikel baru</a>
        </div>
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
                @foreach ($artikels as $artikel)
                <form action="{{ route('admin.artikel.destroy', ['id' => $artikel->id_artikel]) }}" method="post">
                  @csrf
                  @method('delete')
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $artikel->judul }}</td>
                    <td>{{ $artikel->link }}</td>
                    <td>{{ $artikel->deskripsi }}</td>
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
        <h3>Artikel belum ada!</h3>
        <a href="{{ route('admin.artikel.tambah') }}" class="btn btn-theme">Artikel baru</a>
      </div>
      @endif
      
    </div>
@endsection
