<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\RegistrationController; 
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\WatchedMovieController; 

Route::get('/', [MovieController::class, "index"])->name('home');

Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegistrationController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); 
Route::post('/login', [LoginController::class, 'login']);

Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('movies', MovieController::class)->except(['index', 'show']);
});

Route::middleware('auth')->group(function () {

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    Route::post('/movies/{movie}/watched/toggle', [WatchedMovieController::class, 'toggle'])
        ->name('movies.watched.toggle');
        
    Route::post('/rating', [RatingController::class, 'store'])
        ->name('rating.store');

});