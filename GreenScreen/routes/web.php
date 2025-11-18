<?php 

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\RegistrationController; 
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Http\Controllers\MovieController;

// Főoldal
Route::view('/', 'welcome');

Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register'); 

Route::get('/', [RegistrationController::class, 'showRegistrationForm']);

Route::post('/register', [RegistrationController::class, 'registerUser']);


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
});

Route::get('/home', function() {
    if (auth()->check()) {
        return view('home', ['username' => auth()->user()->name]);
    }
    return redirect()->route('register');
})->name('home');