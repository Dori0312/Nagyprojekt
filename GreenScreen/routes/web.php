<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\RegistrationController; 
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\WatchedMovieController; 
// Figyelem: A RatingController már nincs használatban, mert a MovieController kezeli az értékelést!

/*
|--------------------------------------------------------------------------
| Nyilvános útvonalak (Mindenki láthatja)
|--------------------------------------------------------------------------
*/

// Főoldal (Filmlista)
Route::get('/', [MovieController::class, "index"])->name('home');

// Regisztráció
Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegistrationController::class, 'register']);

// Bejelentkezés
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); 
Route::post('/login', [LoginController::class, 'login']);

// Film részletező oldala (Mindenki láthatja)
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');


/*
|--------------------------------------------------------------------------
| Bejelentkezett felhasználók útvonalai
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Kijelentkezés
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    // Film megtekintettnek jelölése (WatchedMovieController)
    Route::post('/movies/{movie}/watched/toggle', [WatchedMovieController::class, 'toggle'])
        ->name('movies.watched.toggle');
        
    // Film értékelése (MovieController::rate metódusa)
    Route::post('/movies/{movie}/rate', [MovieController::class, 'rate'])
        ->name('movies.rate');
});


/*
|--------------------------------------------------------------------------
| Admin útvonalak (Bejelentkezett és 'admin' szereppel rendelkezők)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {
    // Resource route-ok: create, store, edit, update, destroy
    Route::resource('movies', MovieController::class)->except(['index', 'show']);
});