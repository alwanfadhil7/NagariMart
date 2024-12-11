<!DOCTYPE html>
<html>

<head>
    <title>Online Shop</title>
</head>

<body>
    <h1>Product List</h1>
    <ul>
        @foreach($products as $product)
        <li>
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <p>Price: ${{ $product->price }}</p>
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button type="submit">Add to Cart</button>
            </form>
        </li>
        @endforeach
    </ul>
</body>

</html>