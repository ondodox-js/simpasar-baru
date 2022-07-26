@extends('layouts.app')

@section('content')
<h3><i class="fa fa-angle-right"></i> Data Produk Terdaftar</h3>
    <div class="row">
      @if (count($produks) > 0)
      <div class="col-md-12">
          <div class="text-right mb">
            <a href="{{ route('admin.produk.tambah') }}" class="btn btn-theme">Produk baru</a>
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
                      <td>Rp {{ number_format($produk->harga_lama,0,',','.') }}</td>
                      <td>Rp {{ number_format($produk->harga_terbaru,0,',','.') }}</td>
                      <td>
                        <a href="{{ route('admin.produk.edit', ['id' => $produk->id_produk]) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus {{ $produk->nama_lengkap }} ?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
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
