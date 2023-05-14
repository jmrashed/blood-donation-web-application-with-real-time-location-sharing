<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Donor;
use Faker\Factory as Faker;

class DonorSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 100; $i++) {
            Donor::create([
                'fullname' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('password'), // Replace 'password' with your desired default password
                'gender' => $faker->randomElement(['Male', 'Female']),
                'date_of_birth' => $faker->date,
                'last_donate_date' => $faker->date,
                'phone' => $faker->phoneNumber,
                'division_id' => $faker->numberBetween(1, 8), // Replace 1 and 8 with the appropriate division IDs
                'district' => $faker->city,
                'upazila' => $faker->city,
                'location' => $faker->address,
                'blood_group' => $faker->randomElement(['A+', 'B+', 'AB+', 'O+', 'A-', 'B-', 'AB-', 'O-']),
                'post_code' => $faker->postcode,
                'rank' => $faker->numberBetween(1, 10),
                'web_url' => $faker->url,
                'fb_url' => $faker->url,
                'profile_photo' => $faker->imageUrl(200, 200), // Replace with your desired image source
                'latitude' => $faker->latitude,
                'longitude' => $faker->longitude,
                'varification' => $faker->numberBetween(0, 1),
                'lastLat' => $faker->latitude,
                'lastLng' => $faker->longitude,
                'fcm_email' => $faker->email,
                'fcm_uid' => $faker->uuid,
                'fcm_token' => $faker->uuid,
                'age' => $faker->numberBetween(18, 60),
                'pro_visible' => $faker->randomElement(['Yes', 'No']),
                'called_date' => $faker->date,
                'called_today' => $faker->randomElement(['Yes', 'No']),
                'religion' => $faker->randomElement(['Islam', 'Christianity', 'Hinduism', 'Buddhism', 'Other']),
                'is_physically_disabled' => $faker->randomElement(['Yes', 'No']),
                'nationality' => $faker->country,
                'nid' => $faker->randomNumber(8),
                'status' => $faker->randomElement(['Active', 'Inactive']),
                'number_of_donate' => $faker->numberBetween(0, 20),
                'updated_by' => 1, // Replace with the appropriate user ID
            ]);
        }
    }
}
