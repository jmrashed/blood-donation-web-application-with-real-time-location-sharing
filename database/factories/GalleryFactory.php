<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    protected $model = Gallery::class;

    public function definition()
    {
        return [
            'page_name' => $this->faker->word,
            'gallery_name' => $this->faker->sentence,
            'updated_by' => 1,
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
