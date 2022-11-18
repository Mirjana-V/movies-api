<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(),
            'director' =>  $this->faker->name(),
            'imageUrl' => $this->faker->url(),
            'duration' => $this->faker->numberBetween(1, 500),
            'releaseDate' => $this->faker->date(),
            'genre' => $this->faker->text(),
        ];
    }
}