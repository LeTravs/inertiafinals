<?php

namespace Database\Factories;

use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\Factory;

class SongFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Song::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => fake()->unique()->sentence(),
            'artist' => fake()->unique()->name(),
            'image_url' => $this->faker->imageUrl(250, 150, 'people', true, 'artist'),
        ];
    }
}
