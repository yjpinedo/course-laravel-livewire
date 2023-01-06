<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        return [
            'title' => $title,
            'slug' => str($title)->slug(),
            'date' => $this->faker->date(),
            'description' => $this->faker->paragraph,
            'text' => $this->faker->text(200),
            'posted' => $this->faker->randomElement(['not', 'yes']),
            'type' => $this->faker->randomElement(['adverd', 'post', 'course', 'movie']),
            'category_id' => Category::all()->random()->id
        ];
    }
}
