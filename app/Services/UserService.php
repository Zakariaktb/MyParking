<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Exception;
class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository =$userRepository;
    }
    public function create(array $user_Data)
    {
        try {

            $data = [
                'name' => $user_Data['name'],
                'phone' => $user_Data['phone'],
                'car_plate' => $user_Data['car_plate'],
                'service' => $user_Data['service'],
            ];
            $result = $this->userRepository->createUser($data);
            return response()->json($result, 200);
        } catch (Exception $e) {

            return response()->json(['error' =>$e->getMessage()], 500);
        }
    }

}
