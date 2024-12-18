<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function electronics()
    {
        // Ambil produk dari database (gunakan Eloquent untuk ini)
        $products = Product::all();  // Mengambil semua produk

        return view('categories.electronics', compact('products'));
    }
}
