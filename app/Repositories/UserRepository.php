<?php

namespace App\Repositories;

use App\Models\Service;
use App\Models\User;
use App\Models\Transaction;
use Carbon\Carbon;

class UserRepository
{
    public function createUser(array $userData)
    {
        $user = User::create([
            'name' => $userData['name'],
            'phone' => $userData['phone'],
            'car_plate' => $userData['car_plate'],
        ]);
        $userId = $user->id;
        session(['userId' => $userId]);
        $Id = session('userId');
        $service = Service::where('name', $userData['service'])->first();
        // $service = Service::all();
        $transaction = Transaction::create([
            'user_id' => $userId,
            'type_id' => $service->id,
            'entered_at'=> Carbon::now(),
            'price'=>$service->price,
        ]);
        return response()->json($transaction);
    }
}
