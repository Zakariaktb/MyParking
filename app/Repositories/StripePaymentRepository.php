<?php

namespace App\Repositories;

use App\Models\Transaction;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripePaymentRepository
{
    public function createSession()
    {
        // Replace the following line with your Stripe secret key.
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $YOUR_DOMAIN = 'http://localhost:8000';
        $transaction=Transaction::where('user_id',session("userId"))->first();
        // dd($transaction);
        $checkout_session = Session::create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'unit_amount' =>$transaction->total*100,
                    'product_data' => [
                        'name' => 'My Parking',
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $YOUR_DOMAIN . '/success.html',
            'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
        ]);
        $transaction->payment_session_id=$checkout_session->id;
        $transaction->save();
        return $checkout_session->url;
    }

}
