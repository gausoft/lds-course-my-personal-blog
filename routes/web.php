<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

# CREATE
Route::get('/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

# READ
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

# UPDATE
Route::get('/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::post('/edit/{id}', [PostController::class, 'update'])->name('posts.update');

# DELETE
Route::delete('/posts/{id}/delete', [PostController::class, 'delete'])->name('posts.delete');
