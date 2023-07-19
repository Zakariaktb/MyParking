<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Transaction;

class UserRepository
{
    public function createUser(array $userData)
    {
        $user = User::create([
            'name' => $userData['name'],
            'phone' => $userData['phone'],
            'car_plate' => $userData['car_plate'],
        ]);
        // $transaction = Transaction::create([
        //     'service' => $userData['service'],

        // ]);
    }
}
