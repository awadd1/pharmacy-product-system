<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class PharmacyFactory extends Factory
{
    protected $model = \App\Models\Pharmacy::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'address' => $this->faker->address(),
        ];
    }
}