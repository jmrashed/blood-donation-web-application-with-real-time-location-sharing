<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GalleriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Create sample data
        $galleries = [
            [
                'page_name' => 'Homepage',
                'gallery_name' => 'Homepage Gallery',
                'updated_by' => 1,
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'page_name' => 'About Us',
                'gallery_name' => 'About Us Gallery',
                'updated_by' => 1,
                'updated_at' => now(),
                'created_at' => now(),
            ],
            // Add more sample data as needed
        ];

        // Insert sample data into the database
        Gallery::insert($galleries);
    }
}
