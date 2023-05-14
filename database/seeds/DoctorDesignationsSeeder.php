<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DoctorDesignation;

class DoctorDesignationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $designations = [
            ['name' => 'Cardiologist', 'slug' => 'cardiologist'],
            ['name' => 'Dermatologist', 'slug' => 'dermatologist'],
            ['name' => 'Endocrinologist', 'slug' => 'endocrinologist'],
            ['name' => 'Gastroenterologist', 'slug' => 'gastroenterologist'],
            ['name' => 'Neurologist', 'slug' => 'neurologist'],
            ['name' => 'Oncologist', 'slug' => 'oncologist'],
            ['name' => 'Pediatrician', 'slug' => 'pediatrician'],
            ['name' => 'Psychiatrist', 'slug' => 'psychiatrist'],
            ['name' => 'Surgeon', 'slug' => 'surgeon'],
        ];

        foreach ($designations as $designation) {
            DoctorDesignation::create($designation);
        }
    }
}
