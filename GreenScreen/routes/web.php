<?php 

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\RegistrationController; 
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\WatchedMovieController; 
use Illuminate\Support\Facades\Auth;

// Főoldal (Top Movies)
Route::get('/', [MovieController::class, "index"])->name('home');

// Regisztráció
Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegistrationController::class, 'register']);

// Belépés
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); 
Route::post('/login', [LoginController::class, 'login']);

// Kijelentkezés
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
});

// Film Megjelenítése
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');

// --- Bejelentkezett felhasználói funkciók ---
Route::middleware('auth')->group(function () {

    // Film értékelése 
    Route::post('/movies/{movie}/rate', [MovieController::class, 'rate'])->name('movies.rate');
    
    // WatchedMovie állapot váltása (Megtekintett/Nem megtekintett)
    Route::post('/movies/{movie}/watched/toggle', [WatchedMovieController::class, 'toggle'])
        ->name('movies.watched.toggle');
        
    // ÚJ ÚTVONAL: Értékelés mentése vagy frissítése (RatingController használata)

    Route::post('/rating', [RatingController::class, 'store'])
        ->name('rating.store');

});
