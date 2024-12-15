<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductPharmacyFactory extends Factory
{
    public function definition()
    {
        return [
            'product_id' => Product::inRandomOrder()->first()->id,
            'pharmacy_id' => Pharmacy::inRandomOrder()->first()->id, 
            'price' => $this->faker->randomFloat(2, 5, 100),
        ];
    }
}