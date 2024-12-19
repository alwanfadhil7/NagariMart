<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Routes for Cart functionality
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');  // Menambah produk ke cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');          // Menampilkan cart
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update'); // Update cart
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove'); // Remove item


// Electronics page
Route::get('/categories/electronics', [ProductController::class, 'electronics'])->name('categories.electronics');
Route::get('/electronics', [ProductController::class, 'electronics'])->name('electronics.index');

// checkout fitur
Route::post('/checkout', [CheckoutController::class, 'processPayment'])->name('checkout.process');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
