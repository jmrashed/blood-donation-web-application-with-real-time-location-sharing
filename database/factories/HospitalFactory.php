<?php

namespace Database\Factories;

use App\Models\Hospital;
use Illuminate\Database\Eloquent\Factories\Factory;

class HospitalFactory extends Factory
{
    protected $model = Hospital::class;

    public function definition()
    {
        return [
            'hospital_name' => $this->faker->company,
            'location' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'incharge_name' => $this->faker->name,
            'details' => $this->faker->paragraph,
        ];
    }
}
