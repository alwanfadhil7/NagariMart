<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Menambahkan produk ke cart
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $product = Product::findOrFail($request->product_id);
        $cart = session('cart', []);

        $this->addProductToCart($cart, $product);

        session(['cart' => $cart]);  // Simpan cart ke session

        return redirect()->route('electronics.index');
    }

    // Menampilkan cart
    public function index()
    {
        $cart = session('cart', []);
        $total = $this->calculateTotal($cart);

        return view('cart.index', compact('cart', 'total'));
    }

    // Mengupdate kuantitas produk di cart
    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session('cart', []);
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Cart is empty.');
        }

        foreach ($cart as $key => $item) {
            if ($item['id'] == $product_id) {
                $cart[$key]['quantity'] = $quantity;
                break;
            }
        }

        session(['cart' => $cart]);  // Simpan perubahan ke session

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully');
    }

    // Menghapus item dari cart
    public function remove(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $cart = session('cart', []);
        $product_id = $request->input('product_id');

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Cart is empty.');
        }

        $cart = array_filter($cart, function ($item) use ($product_id) {
            return $item['id'] != $product_id;
        });

        $cart = array_values($cart);  // Reindex array setelah menghapus item

        session(['cart' => $cart]);  // Simpan perubahan ke session

        return redirect()->route('cart.index')->with('success', 'Item removed from cart');
    }

    // Menambahkan produk ke dalam cart
    private function addProductToCart(&$cart, $product)
    {
        $found = false;
        foreach ($cart as $key => $item) {
            if ($item['id'] == $product->id) {
                $cart[$key]['quantity'] += 1;  // Menambah kuantitas produk jika sudah ada
                $found = true;
                break;
            }
        }

        if (!$found) {
            // Menambahkan produk baru ke cart
            $cart[] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,  // Menambah produk dengan kuantitas 1
            ];
        }
    }

    // Menghitung total cart
    private function calculateTotal($cart)
    {
        return collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });
    }
}
