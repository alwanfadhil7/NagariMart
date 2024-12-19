<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function processPayment(Request $request)
    {
        // Fetch cart session data
        $cart = session('cart');

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        // Calculate total price from cart
        $totalAmount = array_reduce($cart, function ($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);

        // Simulate payment processing logic
        // Here you can integrate with a payment gateway (e.g., PayPal, Stripe)

        // Example of successful payment processing
        session()->forget('cart');  // Clear the cart after successful payment
        return redirect()->route('cart.index')->with('success', 'Payment successful, order placed!');
    }
}
