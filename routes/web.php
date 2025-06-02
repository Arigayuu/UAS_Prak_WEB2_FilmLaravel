<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\WatchlistController;
use App\Http\Controllers\HomeController;

Route::view('/landing', 'landing')->name('landing');

Route::get('/about', [AboutController::class, 'index'])->name('about');

// Routes yang membutuhkan login
Route::middleware(['auth'])->group(function () {
    // Rating routes
    Route::post('/films/{film}/ratings', [RatingController::class, 'store'])->name('ratings.store');
    Route::patch('/ratings/{rating}', [RatingController::class, 'update'])->name('ratings.update');
    Route::delete('/ratings/{rating}', [RatingController::class, 'destroy'])->name('ratings.destroy');

    // Watchlist routes
    Route::get('/watchlist', [WatchlistController::class, 'index'])->name('watchlist.index');
    Route::post('/films/{film}/watchlist', [WatchlistController::class, 'store'])->name('watchlist.store');
    Route::patch('/watchlist/{watchlist}', [WatchlistController::class, 'update'])->name('watchlist.update');
    Route::delete('/watchlist/{watchlist}', [WatchlistController::class, 'destroy'])->name('watchlist.destroy');

    // Film management routes
    Route::get('/films/create', [FilmController::class, 'create'])->name('films.create');
    Route::post('/films', [FilmController::class, 'store'])->name('films.store');
    Route::get('/films/{film}/edit', [FilmController::class, 'edit'])->name('films.edit');
    Route::put('/films/{film}', [FilmController::class, 'update'])->name('films.update');
    Route::delete('/films/{film}', [FilmController::class, 'destroy'])->name('films.destroy');

    // Category management routes
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

// Routes yang bisa diakses tanpa login
Route::get('/', [HomeController::class, 'index']);
Route::get('/films', [FilmController::class, 'index'])->name('films.index');
Route::get('/films/{film}', [FilmController::class, 'show'])->name('films.show');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

// Auth Routes (biasanya di luar middleware check.auth agar bisa diakses oleh user yang belum login)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);