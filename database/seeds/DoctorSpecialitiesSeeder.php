<?php

namespace Database\Seeders;

use App\Models\DoctorSpeciality;
use Illuminate\Database\Seeder;

class DoctorSpecialitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialities = [
            ['name' => 'Cardiology'],
            ['name' => 'Dermatology'],
            ['name' => 'Endocrinology'],
            ['name' => 'Gastroenterology'],
            ['name' => 'Neurology'],
            ['name' => 'Oncology'],
            ['name' => 'Pediatrics'],
            ['name' => 'Psychiatry'],
            ['name' => 'Surgery'],
        ];

        foreach ($specialities as $speciality) {
            DoctorSpeciality::create($speciality);
        }
    }
}
