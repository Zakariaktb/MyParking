<?php

namespace App\Repositories;

use App\Models\Payment;
use App\Models\Transaction;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Http\Request;
use Exception;
class PaymentRepository
{
    public function create($token)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $id=session('userId');
            $transaction = Transaction::where('user_id', $id)->first();
            $Price = $transaction->total * 100;
            $charge = Charge::create([
                'amount' => $Price,
                'currency' => 'usd',
                'source' => $token,
                'description' => 'Test Payment',
            ]);
            return response()->json(['message' => 'Payment successful', 'charge_id' => $charge->id], 200);
        } catch (\Stripe\Exception\CardException $e) {
            // Payment failed due to a card error (e.g., insufficient funds, card declined)
            return response()->json(['error' => $e->getMessage()], 400);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Generic API error
            return response()->json(['error' => $e->getMessage()], 500);
        } catch (Exception $e) {
            // Something else happened
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }

    public function findById($id)
    {
        // Find a payment record by its ID
        return Payment::find($id);
    }

    public function update(array $data, $id)
    {
        // Update a payment record by its ID
        $payment = Payment::find($id);
        if ($payment) {
            $payment->update($data);
            return $payment;
        }
        return null;
    }

    public function delete($id)
    {
        // Delete a payment record by its ID
        return Payment::destroy($id);
    }

    // Add other methods as needed to query the payments table.
}
