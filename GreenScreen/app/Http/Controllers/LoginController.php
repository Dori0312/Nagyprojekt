<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class LoginController extends Controller
{
    /**
     * Megjeleníti a bejelentkezési űrlapot.
     */
    public function showLoginForm()
    {
        // Adatbázis ellenőrzés, feltételezve, hogy a 'migration_error' és 'database_error' view-k léteznek
        try {
            DB::connection()->getPdo();
            if (!DB::getSchemaBuilder()->hasTable('users')) {
                return view('migration_error'); 
            }
            return view('login'); 

        } catch (\Exception $e) {
             if ($e instanceof QueryException && str_contains($e->getMessage(), 'Base table or view not found')) {
                 return view('migration_error'); 
             }
             return view('database_error'); 
        }
    }

    /**
     * Kezeli a bejelentkezési kísérletet.
     */
    public function login(LoginRequest $request)
    {
        // JAVÍTVA: A hitelesítő adatokban most már 'email' és 'password' kulcsokat használunk
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Bejelentkezési kísérlet
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            // A web.php alapján a főoldal neve: 'home'
            return redirect()->intended(route('home'))->with('success', 'Sikeres bejelentkezés!');
        }

        // Sikertelen bejelentkezés esetén (a Laravel konvenciók szerint az 'email' kulcson küldjük a hibát)
        return back()->withErrors([
            'email' => 'A megadott hitelesítő adatok nem egyeznek a nyilvántartásban szereplő adatokkal.',
        ])->onlyInput('email');
    }

    /**
     * Kijelentkezteti a felhasználót.
     */
    public function logout(\Illuminate\Http\Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // A web.php alapján a főoldal (/) neve: 'home', de a '/' a default welcome oldal a web.php-ban
        return redirect('/')->with('success', 'Sikeres kijelentkezés!');
    }
}