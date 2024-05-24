<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Playlist>
 */
class PlaylistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $genres = ['Rock', 'Pop', 'Country', 'Jazz', 'Hip Hop', 'R&B', 'Electronic', 'Classical', 'Folk', 'Reggae'];

        return [
            'title' => fake()->unique()->sentence(),
            'artist_name' => fake()->unique()->name(),
            'genre' => fake()->randomElement($genres),
        ];
    }
}
