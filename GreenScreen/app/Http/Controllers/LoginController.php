<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest; // Ezt még létrehozzuk!
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
        // Adatbázis ellenőrzés, hasonlóan a regisztrációhoz
        try {
            DB::connection()->getPdo();
            if (!DB::getSchemaBuilder()->hasTable('users')) {
                return view('migration_error'); 
            }
            return view('login'); // Ezt a view-t hozzuk létre a 4. lépésben

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
        // A LoginRequest már validálta az adatokat, csak az emailt és jelszót kell átadnunk
        $credentials = [
            'email' => $request->emailcim,
            'password' => $request->jelszo,
        ];

        // Bejelentkezési kísérlet
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            return redirect()->intended('/home')->with('success', 'Sikeres bejelentkezés!');
        }

        // Sikertelen bejelentkezés esetén
        return back()->withErrors([
            'emailcim' => 'A megadott adatok nem egyeznek a nyilvántartásban szereplő adatokkal.',
        ])->onlyInput('emailcim');
    }

    /**
     * Kijelentkezteti a felhasználót.
     */
    public function logout(\Illuminate\Http\Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Sikeres kijelentkezés!');
    }
}