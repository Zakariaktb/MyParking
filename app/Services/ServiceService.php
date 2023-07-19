<?php

namespace App\Services;

use App\Repositories\ServiceRepository;

class ServiceService
{
    protected $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function createService(array $serviceData)
    {

        return $this->serviceRepository->create($serviceData);
    }

    public function updateService(array $serviceData, $serviceId)
    {

        return $this->serviceRepository->update($serviceData, $serviceId);
    }

    public function deleteService($serviceId)
    {

        return $this->serviceRepository->delete($serviceId);
    }

    public function getServiceById($serviceId)
    {

        return $this->serviceRepository->findById($serviceId);
    }


}
