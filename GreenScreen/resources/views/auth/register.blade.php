@extends('layouts.app')

@section('title', 'Regisztráció')

@section('styles')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <style>
        /* Egyedi stílusok a megadott formátumhoz */
        .form-card {
            max-width: 400px;
            margin: 0 auto;
            padding: 2rem;
            background: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
        }
        /* Egyedi input és gomb stílusok felülírása a Tailwindhez képest */
        input[type="text"], input[type="email"], input[type="password"] {
            /* A Tailwind class-eket felülírjuk az egyedi stílusokkal */
            padding: 0.5rem 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            margin-top: 0.25rem;
            margin-bottom: 1rem;
        }
        .register-button {
            /* Az eredetileg megadott piros gomb szín beállítása */
            background-color: #f53003;
            color: white;
            padding: 0.75rem 1rem;
            border-radius: 0.375rem;
            font-weight: 600;
            width: 100%;
            transition: background-color 0.3s;
        }
        .register-button:hover {
            background-color: #c92800;
        }
        /* Betűtípus alkalmazása az egész tartalmi szekcióra, felülírva a Tailwind alapértelmezését */
        .content-body {
            font-family: 'Instrument Sans', sans-serif;
        }
    </style>
@endsection

@section('content')

    {{-- A fő tartalom (form) --}}
    <div class="flex items-center justify-center w-full lg:grow content-body">
        <main class="form-card w-full mt-12 mb-12">
            
            <h2 class="text-2xl font-bold mb-4 text-center">Regisztráció</h2>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <form method="POST" action="/register">
                @csrf 
                
                {{-- Név --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Név</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">E-mail cím</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>

                {{-- Jelszó --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Jelszó</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                {{-- Jelszó megerősítése --}}
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Jelszó megerősítése</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>

                {{-- Gomb --}}
                <div class="mt-6">
                    <button type="submit" class="register-button">
                        Regisztrálok
                    </button>
                </div>
            </form>
            
            <p class="mt-4 text-center text-sm text-gray-600">
                Már van fiókod? 
                <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-medium">Lépj be!</a>
            </p>

        </main>
    </div>

@endsection