<?php 

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\RegistrationController; 
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

// Főoldal
Route::view('/', 'welcome');

Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register'); 

Route::get('/', [RegistrationController::class, 'showRegistrationForm']);

Route::post('/register', [RegistrationController::class, 'registerUser']);

Route::get('/home', function() {
    if (auth()->check()) {
        return view('home', ['username' => auth()->user()->name]);
    }
    return redirect()->route('register');
})->name('home');