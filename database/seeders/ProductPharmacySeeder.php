<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductPharmacy;

class ProductPharmacySeeder extends Seeder
{
    public function run()
    {
        \App\Models\ProductPharmacy::factory(100)->create();
    }
}