@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center mb-6">Checkout</h1>

    <div class="flex justify-center">
        <button id="pay-button" class="bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600">
            Proceed to Payment
        </button>
    </div>

    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function () {
            snap.pay('{{ $snap_token }}');  // Token from backend
        };
    </script>
</div>
@endsection
