@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center mb-6">Shopping Cart</h1>

    @if(session('success'))
    <div class="alert alert-success bg-green-500 text-white p-4 rounded-lg mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if(count($cart) > 0)
    <table class="table-auto w-full border-separate border-spacing-2 mb-8">
        <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th class="px-4 py-2 border">Image</th>
                <th class="px-4 py-2 border">Product Name</th>
                <th class="px-4 py-2 border">Price</th>
                <th class="px-4 py-2 border">Quantity</th>
                <th class="px-4 py-2 border">Total</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $item)
            <tr class="bg-white border-b hover:bg-gray-50">
                <td class="px-4 py-2 text-center">
                    <img src="{{ asset('images/' . ($item['image'] ?? 'default-image.jpg')) }}" alt="{{ $item['name'] }}" class="w-24 h-24 object-cover rounded">
                </td>
                <td class="px-4 py-2">{{ $item['name'] }}</td>
                <td class="px-4 py-2">${{ number_format($item['price'], 2) }}</td>
                <td class="px-4 py-2">
                    <form action="{{ route('cart.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" required class="border p-2 rounded w-20">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-2 hover:bg-blue-600">Update</button>
                    </form>
                </td>
                <td class="px-4 py-2">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                <td class="px-4 py-2">
                    <form action="{{ route('cart.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md mt-2 hover:bg-red-600">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3 class="text-xl font-semibold text-center mb-4">Total: ${{ number_format($total, 2) }}</h3>
    @else
    <p class="text-center text-gray-600">Your cart is empty.</p>
    @endif

    <div class="flex justify-center mt-4">
        <a href="{{ route('electronics.index') }}" class="bg-gray-400 text-white px-6 py-3 rounded-md hover:bg-gray-500">Continue Shopping</a>
    </div>
</div>
@endsection
