@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6 px-4">
    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Your Cart</h2>

    @if(session('success'))
    <div class="alert alert-success p-4 mb-4 bg-green-200 text-green-800 rounded-md">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger p-4 mb-4 bg-red-200 text-red-800 rounded-md">
        {{ session('error') }}
    </div>
    @endif

    @if(count($cart) > 0)
    <table class="table-auto w-full mt-4 border border-gray-300 rounded-lg">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2 text-left">Name</th>
                <th class="px-4 py-2 text-left">Price</th>
                <th class="px-4 py-2 text-left">Quantity</th>
                <th class="px-4 py-2 text-left">Total</th>
                <th class="px-4 py-2 text-left">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $product_id => $item)
            <tr class="border-b border-gray-300">
                <td class="px-4 py-2">{{ $item['name'] }}</td>
                <td class="px-4 py-2">{{ number_format($item['price'], 2) }}</td>
                <td class="px-4 py-2">
                    <form action="{{ route('cart.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product_id }}">
                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-16 border border-gray-300 rounded-lg px-2 py-1">
                        <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-lg">Update</button>
                    </form>
                </td>
                <td class="px-4 py-2">{{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                <td class="px-4 py-2">
                    <form action="{{ route('cart.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product_id }}">
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h4 class="mt-4 text-lg font-semibold">Total: {{ number_format($total, 2) }}</h4>

    <div class="mt-6">
        <a href="#" class="px-6 py-3 bg-green-500 text-white rounded-lg">Proceed to Checkout</a>
    </div>
    @else
    <p class="mt-4 text-gray-600">Your cart is empty.</p>
    @endif
</div>
@endsection