<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(640, 480, 'cats', true),
            'extract' => $this->faker->paragraph,
            'body' => $this->faker->paragraphs(3, true),
            'price' => $this->faker->randomElement([9.99, 19.99, 39.99, 49.99]),
        ];
    }
}
