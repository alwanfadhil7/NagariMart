<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function electronics()
    {
        return view('categories.electronics', ['category' => 'Electronics']);
    }

    public function fashion()
    {
        return view('categories.fashion', ['category' => 'Fashion']);
    }

    public function groceries()
    {
        return view('categories.groceries', ['category' => 'Groceries']);
    }
}
