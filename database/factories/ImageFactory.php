<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imagePath = $this->faker->image('public/storage/posts', 640, 480, null, false);
    return [
        'url' => $imagePath ? 'posts/' . $imagePath : 'posts/default.png',
    ];
    }
}
