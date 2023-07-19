<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser(array $userData)
    {

        return $this->userRepository->create($userData);
    }

    public function updateUser(array $userData, $userId)
    {

        return $this->userRepository->update($userData, $userId);
    }

    public function deleteUser($userId)
    {

        return $this->userRepository->delete($userId);
    }

    public function getUserById($userId)
    {

        return $this->userRepository->findById($userId);
    }


}
