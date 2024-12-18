<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Cari produk berdasarkan ID
        $product = Product::find($request->product_id);

        // Simpan produk ke session (keranjang)
        session()->push('cart', $product);

        // Redirect kembali ke halaman produk
        return redirect()->route('electronics.index');
    }
}
