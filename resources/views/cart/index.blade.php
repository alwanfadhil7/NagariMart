<!DOCTYPE html>
<html>

<head>
    <title> Nagari Mart </title>

<body>
    <h1>Your Cart</h1>
    <ul>
        @foreach($cartItems as $item)
        <li>
            <h2>{{ $item->product->name }}</h2>
            <p>Quantity: {{ $item->quantity }}</p>
        </li>
        @endforeach
    </ul>

</body>
</head>

</html>