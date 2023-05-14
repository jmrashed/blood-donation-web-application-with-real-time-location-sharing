<?php

namespace Database\Seeders;

use App\Models\Link;
use Illuminate\Database\Seeder;

class LinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create sample data
        $links = [
            [
                'link_url' => 'https://example.com',
                'link_name' => 'Example Website',
                'link_target' => '_blank',
                'link_image' => 'link-image.jpg',
                'post_id' => 1,
            ],
            [
                'link_url' => 'https://example2.com',
                'link_name' => 'Example Website 2',
                'link_target' => '_blank',
                'link_image' => 'link-image2.jpg',
                'post_id' => 2,
            ],
            // Add more sample data as needed
        ];

        // Insert sample data into the database
        Link::insert($links);
    }
}
