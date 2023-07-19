<?php

namespace App\Repositories;

use App\Models\Payment;

class PaymentRepository
{
    public function create(array $data)
    {
        // Create a new payment record in the database
        return Payment::create($data);
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
