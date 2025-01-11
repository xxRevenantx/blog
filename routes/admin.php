<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->name('home');

// RUTA DE LAS CATEGORÍAS
Route::resource('categories', CategoryController::class)->names("categories");

//RUTA DE LAS ETIQEUTAS
Route::resource('tags', TagController::class)->names("tags");

// RUTAS DEL POST
Route::resource('posts', PostController::class)->names("posts");