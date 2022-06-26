@extends('layouts.app')

@section('content')
<h3><i class="fa fa-angle-right"></i> Data Retribusi</h3>
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
                    <th>Persentase kenaikan biaya</th>
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
                      <td>{{ $retribusi->biaya_awal }}</td>
                      <td>{{ $retribusi->kenaikan_biaya . " %" }}</td>
                      <td>
                        <button class="btn btn-success btn-xs"><i class="fa fa-dollar"></i></button>
                        <a href="{{ route('admin.retribusi.edit', ['id' => $retribusi->id_retribusi]) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Hapus {{ $retribusi->layanan }} ?')"><i class="fa fa-trash-o "></i></button>
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
        <a href="{{ route('admin.retribusi.tambah') }}" class="btn btn-theme">Retribusi baru</a>
      </div>
      @endif
    </div>
@endsection
