<?php 

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\RegistrationController; 
use App\Http\Controllers\LoginController; // HOZZÁADVA!
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Http\Controllers\RatingController; // <-- ÚJ: Hozzáadva a RatingController használatához
use App\Http\Controllers\MovieController;

// Főoldal
Route::view('/', 'welcome');

// --- REGISZTRÁCIÓS ÚTVONALAK ---
// Regisztrációs űrlap megjelenítése
Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register'); 
// Főoldal (alapértelmezetten a regisztrációt mutatja)
Route::get('/', [RegistrationController::class, 'showRegistrationForm']);
// Regisztrációs adatok feldolgozása
Route::post('/register', [RegistrationController::class, 'registerUser']); // JAVÍTVA!

// --- BEJELENTKEZÉS / KIJELENTKEZÉS ÚTVONALAK ---
// Bejelentkezési űrlap megjelenítése
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Bejelentkezési adatok feldolgozása
Route::post('/login', [LoginController::class, 'login']);

// Kijelentkezés
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
});

// --- HOME ÚTVONAL (Védett oldal) ---

Route::get('/home', function() {
    if (auth()->check()) {
        // Ha be van jelentkezve, megjeleníti a 'home' nézetet a felhasználó nevével
        return view('home', ['username' => auth()->user()->name]);
    }
    return redirect()->route('register');
})->name('home');

// ÚJ ÚTVONAL: Értékelés mentése vagy frissítése
// Csak bejelentkezett felhasználók használhatják (middleware('auth'))
Route::post('/rating', [RatingController::class, 'store'])
    ->middleware(['auth'])
    ->name('rating.store');
