<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'author_id' => $this->faker->numberBetween(1, 20),
            'released' => $this->faker->dateTime(),
            'last_update' => $this->faker->dateTime(),
            'reading_time' => $this->faker->numberBetween(1, 15),
            'is_published' => $this->faker->boolean(),
            'text' => $this->faker->text()
        ];
    }
}
