<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post = \App\Models\Post::factory(100)->create();

        $post->each(function ($post) {
            Image::factory(1)->create([
                'imageable_id' => $post->id,
                'imageable_type' => 'App\Models\Post',
            ]);

           // Etiquetas
            $tags = Tag::inRandomOrder()->take(4)->get(); // Tomar 4 etiquetas al azar de la tabla tags y guardarlas en la variable tags 
            $post->tags()->attach($tags);


        });
    }
}
