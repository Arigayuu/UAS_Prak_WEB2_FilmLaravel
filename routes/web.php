<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AboutController;

Route::get('/', function () {
    return redirect()->route('landing');
});
Route::view('/landing', 'landing')->name('landing');

Route::get('/home', function () {
    return redirect()->route('films.index');
})->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::resource('films', FilmController::class);
Route::resource('categories', CategoryController::class);
Route::post('/films/{film}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::patch('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');