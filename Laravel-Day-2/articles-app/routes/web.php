<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/dashboard', [ArticleController::class, 'index1'])->name('dashboard');
Route::get('/dashboard', [ArticleController::class, 'index1'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('/articles', ArticleController::class)->except(['index']);
});
require __DIR__.'/auth.php';
