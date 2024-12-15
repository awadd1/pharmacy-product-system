<?php

namespace App\Interfaces;

interface PharmacyRepositoryInterface
{
    public function getAllPharmacies();
    public function getPharmacyById($id);
}