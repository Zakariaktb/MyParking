<?php

namespace App\Repositories;

use App\Models\Service;

class ServiceRepository
{
    public function create(array $data)
    {
        // Create a new service record in the database
        return Service::create($data);
    }

    public function findById($id)
    {
        // Find a service record by its ID
        return Service::find($id);
    }

    public function update(array $data, $id)
    {
        // Update a service record by its ID
        $service = Service::find($id);
        if ($service) {
            $service->update($data);
            return $service;
        }
        return null;
    }

    public function delete($id)
    {
        // Delete a service record by its ID
        return Service::destroy($id);
    }

    // Add other methods as needed to query the services table.
}
