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
    public function definition(): array
    {
        return [
            //
            'newsTitle' => fake()->name(),
            'newsContent' => fake()->text(),
            'newsPicUrl' => 'http://project-tgs.pri/storage/news/OPLy9xIIF2AGIMrGUdNzVi2HctlP8DGgJqcj37zZ.jpg',
            'newsStatus' => 'pub'
        ];
    }
}
