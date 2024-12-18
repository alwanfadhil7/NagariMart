<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function electronics()
    {
        // Anda dapat menambahkan data yang akan dikirim ke view di sini.
        $products = [
            ['name' => 'Laptop', 'price' => 15000],
            ['name' => 'Smartphone', 'price' => 10000],
        ];

        return view('categories.electronics', compact('products'));
    }
}
