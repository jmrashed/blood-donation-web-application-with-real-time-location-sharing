<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id' => 1,
                'name' => 'Home',
                'slug' => 'home',
                'type' => 'page',
                'created_at' => '2017-05-18 18:37:03',
            ],
            [
                'id' => 2,
                'name' => 'About Us',
                'slug' => 'about_us',
                'type' => 'page',
                'created_at' => '2017-05-18 18:37:19',
            ],
            [
                'id' => 3,
                'name' => 'Contact Us',
                'slug' => 'contact_us',
                'type' => 'page',
                'created_at' => '2017-05-18 18:37:37',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
