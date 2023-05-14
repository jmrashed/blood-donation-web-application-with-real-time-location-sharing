<?php

namespace Database\Seeders;

use App\Models\GalleryDetail;
use Illuminate\Database\Seeder;

class GalleryDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create sample data
        $galleryDetails = [
            [
                'gallery_id' => 1,
                'photo_name' => 'photo1.jpg',
                'updated_by' => 1,
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'gallery_id' => 1,
                'photo_name' => 'photo2.jpg',
                'updated_by' => 1,
                'updated_at' => now(),
                'created_at' => now(),
            ],
            // Add more sample data as needed
        ];

        // Insert sample data into the database
        GalleryDetail::insert($galleryDetails);
    }
}
