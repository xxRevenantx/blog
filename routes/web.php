<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Rutas de las categorías
Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');

// Rutas de las etiquetas
Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
