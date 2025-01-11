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
    // $imagePath = $this->faker->image('public/storage/posts', 640, 480, null, false);

    // dd($imagePath); // Se imprime la ruta de la imagen en la consola

    $faker = \Faker\Factory::create();
    $faker->addProvider(new \Mmo\Faker\PicsumProvider($faker));
    $faker->addProvider(new \Mmo\Faker\LoremSpaceProvider($faker));


    return [
        'url' => 'posts/' . $faker->picsum('public/storage/posts', 640, 480, false),
    ];
}

}
