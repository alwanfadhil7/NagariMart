<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$clientKey = env('MIDTRANS_CLIENT_KEY');
        Config::$isProduction = false; // Use false for sandbox
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $transaction_details = array(
            'order_id' => uniqid(),
            'gross_amount' => 100000, // Example amount
        );

        $item_details = array(
            array(
                'id' => 'item01',
                'price' => 100000,
                'quantity' => 1,
                'name' => 'Product name'
            ),
        );

        $billing_address = array(
            'first_name'    => "John",
            'last_name'     => "Doe",
            'address'       => "Jl. Example",
            'city'          => "Jakarta",
            'postal_code'   => "12345",
            'phone'         => "08123456789",
            'country_code'  => 'IDN'
        );

        $customer_details = array(
            'first_name'    => "John",
            'last_name'     => "Doe",
            'email'         => "john@example.com",
            'phone'         => "08123456789",
            'billing_address'  => $billing_address,
        );

        $transaction = array(
            'payment_type' => 'qris',
            'transaction_details' => $transaction_details,
            'item_details' => $item_details,
            'customer_details' => $customer_details
        );

        $snap_token = Snap::getSnapToken($transaction);

        return view('checkout', compact('snap_token'));
    }
}
