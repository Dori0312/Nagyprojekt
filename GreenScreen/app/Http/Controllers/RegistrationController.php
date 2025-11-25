<?php
namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB; 
use Illuminate\Database\QueryException;

class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(RegistrationRequest $request)
    {
        $user = User::create([
            'name' => $request->felhasznalonev,
            'email' => $request->emailcim,
            'password' => Hash::make($request->jelszo),
        ]);

        Auth::login($user);

        return redirect('/home')->with('success', 'Sikeres regisztráció!');
    }
}