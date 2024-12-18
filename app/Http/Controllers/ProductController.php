<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function electronics()
    {
        $products = [
            ['name' => 'Laptop', 'price' => 1500, 'description' => 'High-performance laptop', 'image' => asset('images/laptop.jpg')],
            ['name' => 'Smartphone', 'price' => 800, 'description' => 'Latest smartphone model', 'image' => asset('images/hp.jpg')],
            ['name' => 'Headphone', 'price' => 200, 'description' => 'Noise-cancelling headphones', 'image' => asset('images/headphone.jpg')],
        ];

        return view('categories.electronics', compact('products'));
    }
}
