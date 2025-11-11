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
        try {

            DB::connection()->getPdo();

            if (!DB::getSchemaBuilder()->hasTable('users')) {
                return view('migration_error'); 
            }
            return view('welcome'); 

        } catch (\Exception $e) {
            if ($e instanceof QueryException && str_contains($e->getMessage(), 'Base table or view not found')) {
                 return view('migration_error'); 
            }
            return view('database_error'); 
        }
    }

    public function registerUser(RegistrationRequest $request)
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