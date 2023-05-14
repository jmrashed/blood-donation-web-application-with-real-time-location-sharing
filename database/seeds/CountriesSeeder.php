<?php

namespace Database\Seeders;

use App\Models\Country;
use database;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create sample data
        $countries = [
            ['id' => 1, 'sortname' => 'US', 'name' => 'United States'],
            ['id' => 2, 'sortname' => 'GB', 'name' => 'United Kingdom'],
            // Add more sample data as needed
        ];

        // Insert sample data into the database
        Country::insert($countries);
    }
}
