<?php

namespace Database\Seeders;

use App\Models\DonateBlood;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;



class DonateBloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 100; $i++) {
            DonateBlood::create([
                'user_name' => $faker->name,
                'user_place' => $faker->city,
                'user_phone' => $faker->phoneNumber,
                'user_email' => $faker->email,
                'last_donate_date' => $faker->date,
                'disease' => $faker->text,
                'donate_blood' => $faker->randomElement(['A+', 'B+', 'AB+', 'O+', 'A-', 'B-', 'AB-', 'O-']),
                'created_by' => 1, // Replace with the appropriate user ID
            ]);
        }
    }
}
