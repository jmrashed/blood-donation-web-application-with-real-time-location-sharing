<?php

namespace Database\Seeders;

use App\Models\Speech;
use Illuminate\Database\Seeder;

class SpeechesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create sample data
        $speeches = [
            [
                'name' => 'John Doe',
                'designation' => 'CEO',
                'description' => 'This is a speech by John Doe, the CEO of the company.',
                'updated_by' => 1,
            ],
            [
                'name' => 'Jane Smith',
                'designation' => 'CFO',
                'description' => 'This is a speech by Jane Smith, the CFO of the company.',
                'updated_by' => 2,
            ],
            // Add more sample data as needed
        ];

        // Insert sample data into the database
        foreach ($speeches as $speech) {
            Speech::create($speech);
        }
    }
}
