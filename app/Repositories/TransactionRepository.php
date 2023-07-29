<?php

namespace App\Repositories;

use App\Models\Payment;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class TransactionRepository
{
    public function create(array $data)
    {
        // Create a new transaction in the database
        return Transaction::create($data);
    }

    public function findById($userId)
    {
        // Find a transaction by its ID
        $user = User::find($userId);
        $transaction = Transaction::where('user_id', $userId)->first();

        if ($transaction) {
            // Update the "exit_at" property with the current date and time
            $transaction->exit_at = Carbon::now()->format('Y-m-d H:i:s');

            // Calculate the time difference between enter and exit timestamps
            $enterTime = Carbon::parse($transaction->entered_at);
            $exitTime = Carbon::parse($transaction->exit_at);
            $durationInSeconds = $exitTime->diffInSeconds($enterTime);
            $durationInHours = $durationInSeconds / 3600;
            $total = $durationInHours * $transaction->price;
            $formattedTotal =  number_format($total, 2);
            // Format the duration as "h:m:s"
            $formattedDuration = gmdate('H:i:s', $durationInSeconds);

            // Save the formatted duration to the "duration" field
            $transaction->duration = $formattedDuration;
            $transaction->total = $formattedTotal;

            // Save the changes to the database
            $transaction->save();

            // Include the related service name in the response
            $serviceName = null;
            if ($transaction->service) {
                $serviceName = $transaction->service->name; // Assuming 'name' is the column with the service name in the 'services' table
            }

            // Prepare the data to be sent in the response
            $responseData = [
                'user' => $user,
                'transaction' => $transaction,
                'service_name' => $serviceName,
            ];
            $payment=new Payment();
            $payment->transaction_id=$transaction->id;
            $payment->amount=$total;
            $payment->paid_at=Carbon::now()->format('Y-m-d H:i:s');
            $payment->status='Completed';
            // Session::flush();
            return response()->json($responseData, 200);
        } else {
            // Handle the case when the transaction is not found.
            return response()->json(['error' => 'Transaction not found for the given user ID.'], 404);
        }
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
