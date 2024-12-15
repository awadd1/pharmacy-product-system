<?php

namespace App\Services;

use App\Interfaces\PharmacyRepositoryInterface;

class PharmacyService
{
    protected $pharmacyRepository;

    public function __construct(PharmacyRepositoryInterface $pharmacyRepository)
    {
        $this->pharmacyRepository = $pharmacyRepository;
    }

    public function getAllPharmacies()
    {
        return $this->pharmacyRepository->getAllPharmacies();
    }

    public function getPharmacyById($id)
    {
        return $this->pharmacyRepository->getPharmacyById($id);
    }
}