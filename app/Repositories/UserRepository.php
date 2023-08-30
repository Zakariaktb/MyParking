<?php

namespace App\Repositories;

use App\Models\Service;
use App\Models\User;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Exception;

class UserRepository
{

    public function createUser(array $userData)
    {
        try {
            $user = User::create([
                'name' => $userData['name'],
                'phone' => $userData['phone'],
                'car_plate' => $userData['car_plate'],
            ]);
            $userId = $user->id;
            session(['userId' => $userId]);
            $Id = session('userId');
            $service = Service::where('name', $userData['service'])->first();

            $transaction = Transaction::create([
                'user_id' => $userId,
                'type_id' => $service->id,
                'entered_at' => Carbon::now(),
                'price' => $service->price,
            ]);
            return response()->json($transaction, 200);
        } catch (QueryException $e) {
            // Handle any query-related exceptions (e.g., database errors)
            return response()->json(['error' => 'A database error occurred while processing the request.'], 500);
        } catch (Exception $e) {
            // Handle any other exceptions that may occur during the process
            return response()->json(['error' => 'An error occurred while processing the request.'], 500);
        }
    }

}
