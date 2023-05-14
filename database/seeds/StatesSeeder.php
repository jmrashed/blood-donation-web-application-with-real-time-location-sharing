<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create sample data
        $states = [
            ['name' => 'State 1', 'country_id' => 1],
            ['name' => 'State 2', 'country_id' => 1],
            // Add more sample data as needed
        ];

        // Insert sample data into the database
        State::insert($states);
    }
}
