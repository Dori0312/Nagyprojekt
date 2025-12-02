<?php 

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\RegistrationController; 
use App\Http\Controllers\LoginController; // HOZZÁADVA!
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Http\Controllers\RatingController; // <-- ÚJ: Hozzáadva a RatingController használatához
use App\Http\Controllers\MovieController;

// Főoldal (csak ez kell)
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
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');
Route::post('/movies/{movie}/rate', [MovieController::class, 'rate'])->middleware('auth')->name('movies.rate');


// Protected /home oldal
Route::get('/home', function() {
    if (auth()->check()) {
        return view('home', ['username' => auth()->user()->name]);
    }
    return redirect()->route('register');
})->name('home');

// ÚJ ÚTVONAL: Értékelés mentése vagy frissítése
// Csak bejelentkezett felhasználók használhatják (middleware('auth'))
Route::post('/rating', [RatingController::class, 'store'])
    ->middleware(['auth'])
    ->name('rating.store');
