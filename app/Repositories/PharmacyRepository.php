<?php

namespace App\Repositories;
use App\Interfaces\PharmacyRepositoryInterface;
use App\Models\Pharmacy;

class PharmacyRepository implements PharmacyRepositoryInterface
{
    public function getAllPharmacies()
    {
        return Pharmacy::all();
    }

    public function getPharmacyById($id)
    {
        return Pharmacy::findOrFail($id);
    }
}