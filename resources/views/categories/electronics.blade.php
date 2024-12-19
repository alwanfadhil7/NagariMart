<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronics Category</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>

    <!-- Header Section -->
    <header class="bg-white dark:bg-gray-800 shadow-md py-4">
        <div class="container mx-auto px-4 flex items-center justify-between">
            <!-- Logo atau Judul Website -->
            <div class="text-2xl font-bold text-white">
                Electronics Category
            </div>

            <!-- Navigation Bar -->
            <nav class="space-x-6">
                <a href="#" class="text-white hover:text-white-500">Home</a>
                <a href="#" class="text-white hover:text-blue-500">Shop</a>
                <a href="#" class="text-white hover:text-blue-500">Contact</a>
            </nav>

            <!-- Cart Icon dengan Jumlah Item -->
            <div class="relative">
                <a href="{{ route('cart.index') }}" class="text-white hover:text-white-500 flex items-center space-x-2">
                    <i class="fa fa-shopping-cart text-xl"></i>
                    <span class="absolute top-0 right-0 text-xs bg-red-600 text-white rounded-full px-1 py-0.5">
                        {{ session('cart') ? count(session('cart')) : 0 }}
                    </span>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mx-auto my-5 px-4">
        <!-- Search Bar -->
        <div class="mb-4">
            <input type="text" class="form-control" placeholder="Search products..." aria-label="Search">
        </div>

        <!-- Filter Options -->
        <div class="mb-4">
            <select class="form-select" aria-label="Filter by category">
                <option selected>Filter by category</option>
                <option value="1">Electronics</option>
                <option value="2">Fashion</option>
                <option value="3">Home Appliances</option>
            </select>
        </div>

        <!-- Judul Halaman -->
        <h1 class="text-center mb-4 text-3xl font-bold">Product List</h1>

        <!-- Grid Produk -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($products as $product)
            <div class="card border rounded-lg shadow-lg">
                <!-- Gambar Produk -->
                <img src="{{ asset('images/' . $product->image) }}" class="card-img-top rounded-t-lg" alt="{{ $product->name }}">

                <!-- Detail Produk -->
                <div class="card-body p-4">
                    <!-- Nama Produk -->
                    <h5 class="card-title text-xl font-semibold">{{ $product->name }}</h5>

                    <!-- Deskripsi Produk -->
                    <p class="card-text text-gray-600">{{ $product->description }}</p>

                    <!-- Harga Produk -->
                    <p class="text-lg font-bold">${{ number_format($product->price, 2) }}</p>

                    <!-- Tombol Tambah ke Keranjang -->
                    <a href="#" class="btn btn-gradient w-full py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-700 mt-4">Add to Cart</a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Keranjang -->
        <div class="cart-info mt-8">
            <a href="{{ route('cart.index') }}" class="text-gray-600 flex items-center space-x-2">
                <i class="fa fa-shopping-cart text-xl"></i>
                <span>Cart ({{ session('cart') ? count(session('cart')) : 0 }} items)</span>
            </a>
            @if(session('cart'))
            <ul class="cart-items mt-4">
                @foreach(session('cart') as $item)
                <li class="flex justify-between py-2 border-b">
                    <span>{{ $item['name'] }} ({{ $item['quantity'] }})</span>
                    <span>${{ number_format($item['price'], 2) }} x {{ $item['quantity'] }} = ${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                </li>
                @endforeach
            </ul>
            <a href="{{ route('cart.index') }}" class="btn btn-primary mt-4 bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-800">Go to Cart</a>
            @else
            <p class="mt-4">Your cart is empty.</p>
            @endif
        </div>
        <!-- Sisipkan footer -->
        @include('partials.footer')
    </div>

</body>

</html>