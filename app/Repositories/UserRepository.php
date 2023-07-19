<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function create(array $data)
    {
        // Create a new user in the database
        return User::create($data);
    }

    public function findById($id)
    {
        // Find a user by their ID
        return User::find($id);
    }

    public function update(array $data, $id)
    {
        // Update a user by their ID
        $user = User::find($id);
        if ($user) {
            $user->update($data);
            return $user;
        }
        return null;
    }

    public function delete($id)
    {
        // Delete a user by their ID
        return User::destroy($id);
    }

    // Add other methods as needed to query the users table.
}
