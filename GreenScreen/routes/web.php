<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\RegistrationController; 
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\WatchedMovieController; 
// DB és QueryException már nem szükséges a web.php-ban, csak a Controller-ekben!

// --------------------------------------------------------------------------
// I. PUBLIC ROUTES (Nyilvános útvonalak - nem kell bejelentkezés)
// --------------------------------------------------------------------------

// Főoldal (Top Movies - bárki láthatja)
Route::get('/', [MovieController::class, "index"])->name('home');

// Regisztráció
Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegistrationController::class, 'register']);

// Belépés
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); 
Route::post('/login', [LoginController::class, 'login']);

// Film Megjelenítése (publikusan elérhető)
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');


// --------------------------------------------------------------------------
// II. ADMIN ROUTES (Adminisztrátori útvonalak)
// --------------------------------------------------------------------------
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
});


// --------------------------------------------------------------------------
// III. AUTHENTICATED ROUTES (Bejelentkezett felhasználói funkciók)
// --------------------------------------------------------------------------
Route::middleware('auth')->group(function () {

    // Kijelentkezés (Mindenképp bejelentkezés kell hozzá)
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    // WatchedMovie állapot váltása (Megtekintett/Nem megtekintett)
    Route::post('/movies/{movie}/watched/toggle', [WatchedMovieController::class, 'toggle'])
        ->name('movies.watched.toggle');
        
    // Értékelés mentése vagy frissítése (RatingController használatával)
    Route::post('/rating', [RatingController::class, 'store'])
        ->name('rating.store');

});