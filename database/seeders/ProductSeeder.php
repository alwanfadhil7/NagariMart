<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {



        Product::create([
            'name' => 'Laptop',
            'price' => 1500,
            'description' => 'High-performance laptop',
            'image' => 'Laptop.jpg',
            'stock' => 10,  // Menambahkan nilai stock
            'category_id' => 1, // Pastikan memberikan nilai category_id
        ]);

        Product::create([
            'name' => 'Smartphone',
            'price' => 800,
            'description' => 'Latest smartphone model',
            'image' => 'Smartphone.jpg',
            'stock' => 20,  // Menambahkan nilai stock
            'category_id' => 1, // Pastikan memberikan nilai category_id
        ]);

        Product::create([
            'name' => 'Headphones',
            'price' => 200,
            'description' => 'Noise-cancelling headphones',
            'image' => 'Headphones.jpg',
            'stock' => 15,  // Menambahkan nilai stock
            'category_id' => 1, // Pastikan memberikan nilai category_id
        ]);
    }
}
