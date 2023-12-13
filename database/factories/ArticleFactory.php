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
        $title = $this->faker->sentence(3);
        return [
            'title' => $title,
            'slug' => str($title)->slug(),
            'content' => $this->faker->paragraph(6),
            'meta_description' => $this->faker->paragraph(4),
            'meta_tags' => implode(', ', $this->faker->words(9)),
            'artwork' => $this->faker->imageUrl(500, 200, 'cats'),
        ];
    }
}
