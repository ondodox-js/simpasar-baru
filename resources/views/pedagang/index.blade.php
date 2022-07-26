@extends('layouts.pedagang')
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
  window.snap.pay('5b2293fe-aadb-434b-89a0-4418ebb1fb80');
  // customer will be redirected after completing payment pop-up
});
</script>
@endpush
@section('content')
    <button id="pay-button" type="button">Bayar</button>
@endsection