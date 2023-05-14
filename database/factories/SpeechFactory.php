<?php

namespace Database\Factories;

use App\Models\Speech;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpeechFactory extends Factory
{
    protected $model = Speech::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'designation' => $this->faker->jobTitle,
            'description' => $this->faker->paragraph,
            'updated_by' => 1,
        ];
    }
}
