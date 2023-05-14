<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    protected $model = Doctor::class;

    public function definition()
    {

        

        return [
            'hospital' => $this->faker->company,
            'name' => $this->faker->name,
            'speciality_id' => 1,
            'designation_id' =>1,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'profile_photo' => null,
            'present_address' => $this->faker->address,
            'chamber_address' => $this->faker->address,
            'doctor_detail' => $this->faker->paragraph,
        ];
    }
}
