<?php

namespace Database\Seeders;

use App\Faq;
use Illuminate\Database\Seeder;

class FaqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create sample data
        $faqs = [
            [
                'category' => 'General',
                'question' => 'What is Lorem Ipsum?',
                'answer' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'author_id' => 1,
                'create_datetime' => now(),
            ],
            [
                'category' => 'Technical',
                'question' => 'How to install Laravel?',
                'answer' => 'You can install Laravel by following the installation guide provided in the official documentation.',
                'author_id' => 1,
                'create_datetime' => now(),
            ],
            // Add more sample data as needed
        ];

        // Insert sample data into the database
        Faq::insert($faqs);
    }
}
