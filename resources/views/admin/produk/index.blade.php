@extends('layouts.app')

@section('content')
<h3><i class="fa fa-angle-right"></i> Data Produk Komoditas Pokok</h3>
    <div class="row">
      @if (count($produks) > 0)
      <div class="col-md-12">
          <div class="text-right mb">
            <a href="{{ route('admin.produk.tambah') }}" class="btn btn-theme">Tambah produk</a>
          </div>
          <div class="content-panel">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama produk</th>
                    <th>Harga sebelumnya</th>
                    <th>Harga terbaru</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($produks as $produk)
                  <form action="{{ route('admin.produk.destroy', ['id' => $produk->id_produk]) }}" method="post">
                    @csrf
                    @method('delete')
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $produk->nama_produk }}</td>
                      <td>{{ $produk->harga_lama }}</td>
                      <td>{{ $produk->harga_terbaru }}</td>
                      <td>
                        <button class="btn btn-success btn-xs"><i class="fa fa-dollar"></i></button>
                        <a href="{{ route('admin.produk.edit', ['id' => $produk->id_produk]) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Hapus {{ $produk->nama_produk }} ?')"><i class="fa fa-trash-o "></i></button>
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
        <h3>Data produk belum ada!</h3>
        <a href="{{ route('admin.produk.tambah') }}" class="btn btn-theme">Produk baru</a>
      </div>
      @endif
    </div>
@endsection
