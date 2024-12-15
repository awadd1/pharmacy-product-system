<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Pharmacy;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        
        $this->call([
            ProductSeeder::class,
            PharmacySeeder::class,
            ProductPharmacySeeder::class,
        ]);

        $pharmacies = Pharmacy::all();
        Product::all()->each(function ($product) use ($pharmacies) {
            $product->pharmacies()->attach(
                $pharmacies->random(rand(1, 5))->pluck('id')->toArray(), 
                ['price' => rand(10, 100)]
            );
        });
    }
}