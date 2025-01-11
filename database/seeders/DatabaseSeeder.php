<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;





class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Storage::deleteDirectory('public/posts');
        Storage::deleteDirectory('posts'); // Se elimina el directorio posts en storage/app/public para almacenar las imágenes de los posts en la base de datos con el seeder ImageSeeder.php y PostSeeder.php
        Storage::makeDirectory('posts'); // Se crea el directorio posts en storage/app/public para almacenar las imágenes de los posts en la base de datos con el seeder ImageSeeder.php y PostSeeder.php


        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            PostSeeder::class,
        ]);
        
    }
}
