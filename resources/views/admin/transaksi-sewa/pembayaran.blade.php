@extends('layouts.app')

@section('content')
    <h3><i class="fa fa-angle-right"></i> Pembayaran</h3>
    <div class="col-lg-12">
        <div class="row content-panel">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="row">
                    <div class="col-md-9">
                        <h4>{{ $pedagang->nama_lengkap }}</h4>
                        <address>
                            <strong>Enterprise Corp.</strong><br>
                            {{ $pedagang->alamat }}<br>
                            <abbr title="Phone">P:</abbr> {{ $pedagang->no_hp }}
                        </address>
                    </div>
                    <!-- /col-md-9 -->
                    <div class="col-md-3">
                    <br>
                    <div>
                        <div class="pull-left"> INVOICE NO : </div>
                        <div class="pull-right"> {{ 'banjar-' . time() }} </div>
                        <div class="clearfix"></div>
                    </div>
                    <div>
                        <!-- /col-md-3 -->
                        <div class="pull-left"> INVOICE DATE : </div>
                        <div class="pull-right"> {{ date('Y-m-d') }} </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- /row -->
                    </div>
                    <!-- /invoice-body -->
                </div>
                <!-- /col-lg-10 -->
                <table class="table">
                    <thead>
                    <tr>
                        <th style="width:60px" class="text-center">JUMLAH BULAN</th>
                        <th class="text-left">KETERANGAN</th>
                        <th style="width:140px" class="text-right">BIAYA SEWA/BULAN</th>
                        <th style="width:90px" class="text-right">TOTAL</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center">{{ $transaksi->jumlah_periode }}</td>
                        <td>{{ $transaksi->keterangan }}</td>
                        <td class="text-right">Rp. {{ number_format($lapak->harga_sewa,0,',','.') }}</td>
                        <td class="text-right">Rp. {{ number_format($transaksi->jumlah_bayar,0,',','.') }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="4">
                        <h4>Terms and Conditions</h4>
                        <p>Thank you for your business. We do expect payment within 21 days, so please process this invoice within that time. There will be a 1.5% interest charge per month on late invoices.</p>
                    </tr>
                    <tr>
                        <td class="text-right no-border">
                        <div class="well well-small green"><strong>Total</strong></div>
                        </td>
                        <td class="text-right"><strong>Rp. {{ number_format($transaksi->jumlah_bayar,0,',','.') }}</strong></td>
                        
                    </tr>
                    </tbody>
                </table>
            </div>
            <form action="{{ route('admin.transaksi-sewa.store') }}" class="form-send text-right" method="POST">
                @csrf
                <button type="submit" class="btn btn-large btn-primary">Berikutnya</button>
            </form>
        </div>
    </div>
@endsection
