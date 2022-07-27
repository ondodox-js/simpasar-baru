@extends('layouts.app')
@push('date-picker-head')
<link href="{{ asset('dashio/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('dashio/css/style-responsive.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('dashio/lib/bootstrap-datepicker/css/datepicker.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('dashio/lib/bootstrap-daterangepicker/daterangepicker.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('dashio/lib/bootstrap-timepicker/compiled/timepicker.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('dashio/lib/bootstrap-datetimepicker/datertimepicker.css') }}" />
@endpush
@push('date-picker')

    <!--script for this page-->
    <script src="{{ asset('dashio/lib/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dashio/lib/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dashio/lib/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dashio/lib/bootstrap-daterangepicker/date.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dashio/lib/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dashio/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dashio/lib/bootstrap-daterangepicker/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dashio/lib/bootstrap-timepicker/js/bootstrap-timepicker.js') }}"></script>
    <script src="{{ asset('dashio/lib/advanced-form-components.js') }}"></script>
@endpush

@section('content')
    <h3>Laporan transaksi</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="content-panel">
                <form class="form-group" action="{{ route('admin.laporan') }}">
                    <div class="col-md-2 col-xs-11">
                        <div data-date-minviewmode="months" data-date-viewmode="years" data-date-format="mm/yyyy" data-date="01/2014" class="input-append date dpMonths">
                            <input type="text" readonly="" value="{{ $date ? $date['start'] : '07/2022' }}" size="16" class="form-control" name="start">
                            <span class="input-group-btn add-on">
                            <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                            </span>
                        </div>
                        <span class="help-block">Select month only</span>
                    </div>
                    <div class="col-md-1">-</div>
                    <div class="col-md-2 col-xs-11">
                        <div data-date-minviewmode="months" data-date-viewmode="years" data-date-format="mm/yyyy" data-date="01/2014" class="input-append date dpMonths">
                        <input type="text" readonly="" value="{{ $date ? $date['end'] : '07/2022' }}" size="16" class="form-control" name="end">
                        <span class="input-group-btn add-on">
                            <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                            </span>
                        </div>
                        <span class="help-block">Select month only</span>
                    </div>
                    <div class="col-md-1">-</div>
                    <div class="form-send col-md-1">
                        <button type="submit" class="btn btn-large btn-primary">FILTER</button>
                    </div>
                    <div class="col-md-1">-</div>
                    <div class="form-send col-md-1">
                        <a href="{{ route('admin.export-laporan') }}" type="button" class="btn btn-large btn-primary">EXPORT</a>
                    </div>
                </form>
                @if (count($transaksis) > 0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>TANGGAL TRANSAKSI</th>
                            <th>KETERANGAN</th>
                            <th>POSISI</th>
                            <th class="text-right">JUMLAH BAYAR</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($transaksis as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d-m-Y h:m:s', strtotime($item->tanggal_transaksi)) }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>{{ $item->posisi }}</td>
                                <td class="text-right">Rp {{ number_format($item->jumlah_bayar,0,',','.') }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" rowspan="1"></td>
                        </tr>
                        <tr></tr>
                        <tr>
                            <td colspan="3" rowspan="4">
                            </td>
                            <td><strong>Total</strong></td>
                            <td class="text-right">Rp {{ number_format($total,0,',','.') }}</td>
                        </tr>
                        </tbody>
                    </table>
                @else
                <div style="margin-top: 10rem; text-align: center">
                    <h3>Transaksi tidak ada!</h3>
                </div>
                @endif
            </div>
        </div>
        
    </div>
@endsection