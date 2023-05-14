<?php

namespace Database\Factories;

use App\Models\Link;
use Illuminate\Database\Eloquent\Factories\Factory;

class LinkFactory extends Factory
{
    protected $model = Link::class;

    public function definition()
    {
        return [
            'link_url' => $this->faker->url,
            'link_name' => $this->faker->company,
            'link_target' => '_blank',
            'link_image' => $this->faker->image('public/storage/links', 200, 200, null, false),
            'post_id' => 1,
        ];
    }
}
