@extends('layouts.app')

@push('pay-scripts')
  <script type="text/javascript"
  src="https://app.sandbox.midtrans.com/snap/snap.js"
  data-client-key="{{ config('midtrans.client_key') }}"></script>
@endpush
@push('pay-action-scripts')
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
    window.snap.pay('{{ $snap_token }}');
    // customer will be redirected after completing payment pop-up
  });
</script>
@endpush
@section('content')
    <h3><i class="fa fa-angle-right"></i> Pembayaran</h3>
    <div class="row">
        <div class="col-md-9">
            <h4>{{ $nama_lengkap }}</h4>
            <address>
            <strong>{{ $email }}</strong><br>
            <abbr title="Phone">Hp:</abbr> {{ $no_hp }}
            </address>
        </div>
        <!-- /col-md-9 -->
        <div class="col-md-3">
          <br>
          <div>
            <div class="pull-left"> INVOICE NO : </div>
            <div class="pull-right"> {{ $kode_pembayaran }} </div>
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
    <table class="table">
        <thead>
          <tr>
            <th style="width:140px" class="text-center">Lama sewa</th>
            <th class="text-left">Deskripsi</th>
            <th style="width:140px" class="text-right">Harga sewa / bulan</th>
            <th style="width:90px" class="text-right">Total</th>
          </tr>
        </thead>
        <tbody>
            @php
                $total = $periode_sewa * $harga_sewa;
            @endphp
            <tr>
                <td class="text-center">{{ $periode_sewa }} bulan</td>
                <td>Penyewaan lapak dengan kode {{ $posisi_lapak }} dan ukuran luas dari lapak ini adalah {{ $luas_lapak }}. </td>
                <td class="text-right">Rp {{ $harga_sewa }} / bulan</td>
                <td class="text-right">Rp {{ $total }}</td>
            </tr>
            <tr>
                <td colspan="2" rowspan="4">
                <h4>Terms and Conditions</h4>
                <p>Thank you for your business. We do expect payment within 21 days, so please process this invoice within that time. There will be a 1.5% interest charge per month on late invoices.</p>
                </td><td class="text-right"><strong>Subtotal</strong></td>
                <td class="text-right">Rp {{ $total }}</td>
            </tr>
            <tr>
                <td class="text-right no-border">
                    <div class="well well-small green"><strong>Total</strong></div>
                </td>
                <td class="text-right"><strong>Rp {{ $total }}</strong></td>
            </tr>
        </tbody>
    </table>
    <div class="form-send text-right">
        <button type="button" id="pay-button" class="btn btn-large btn-theme03">Lanjutkan pembayaran</button>
    </div>
@endsection
