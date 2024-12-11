<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request, Product $product)
    {
        Cart::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'quantity' => 1,
        ]);
        return redirect()->route('cart.index');
    }
    public function index()
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        return view('cart.index', compact('cartItems'));
    }
}
