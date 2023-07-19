<?php

namespace App\Repositories;

use App\Models\Transaction;

class TransactionRepository
{
    public function create(array $data)
    {
        // Create a new transaction in the database
        return Transaction::create($data);
    }

    public function findById($id)
    {
        // Find a transaction by its ID
        return Transaction::find($id);
    }

    public function update(array $data, $id)
    {
        // Update a transaction by its ID
        $transaction = Transaction::find($id);
        if ($transaction) {
            $transaction->update($data);
            return $transaction;
        }
        return null;
    }

    public function delete($id)
    {
        // Delete a transaction by its ID
        return Transaction::destroy($id);
    }

    // Add other methods as needed to query the transactions table.
}
