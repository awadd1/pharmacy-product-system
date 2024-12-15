<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pharmacy;

class PharmacySeeder extends Seeder
{
    public function run()
    {
        \App\Models\Pharmacy::factory(20)->create();
    }
    
}