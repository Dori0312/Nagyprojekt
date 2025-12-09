@extends('layouts.app')

@section('title', 'Bejelentkezés')

@section('styles')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <style>
        .form-card {
            max-width: 400px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -2px rgba(0,0,0,0.1);
            border-radius: 0.5rem;
        }

        input[type="email"], input[type="password"] {
            padding: 0.5rem 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            margin-top: 0.25rem;
            margin-bottom: 1rem;
            width: 100%;
        }
        
        .error-message {
            color: #ef4444; 
            font-size: 0.875rem; 
            margin-top: -0.75rem; 
            margin-bottom: 1rem;
            display: block;
        }

        .register-button, button[type="submit"] {
            background-color: #f53003;
            color: white;
            padding: 0.75rem 1rem;
            border-radius: 0.375rem;
            font-weight: 600;
            width: 100%;
            transition: background-color 0.3s;
        }

        .register-button:hover, button[type="submit"]:hover {
            background-color: #c92800;
        }

        .content-body {
            font-family: 'Instrument Sans', sans-serif;
        }
        
        .alert-success {
            background-color: #d1fae5; 
            border: 1px solid #34d399; 
            color: #065f46; 
            padding: 1rem;
            border-radius: 0.375rem;
            margin-bottom: 1rem;
        }
        .alert-danger {
            background-color: #fee2e2; 
            border: 1px solid #f87171; 
            color: #b91c1c; 
            padding: 1rem;
            border-radius: 0.375rem;
            margin-bottom: 1rem;
        }
    </style>
@endsection

@section('content')
<div class="form-card content-body">
    <h2 class="text-2xl font-bold mb-4 text-center">Bejelentkezés</h2>

    {{-- Globális hibaüzenet a bejelentkezéshez (pl. "Rossz hitelesítő adatok") --}}
    @if ($errors->any())
        <div class="alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf
        
        {{-- HELYESEN: a mező neve 'email' --}}
        <label for="email">E-mail cím:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
            class="@error('email') border-red-500 @enderror">
        @error('email')
            <span class="error-message" role="alert">{{ $message }}</span>
        @enderror

        {{-- HELYESEN: a mező neve 'password' --}}
        <label for="password">Jelszó:</label>
        <input type="password" id="password" name="password" required
            class="@error('password') border-red-500 @enderror">
        @error('password')
            <span class="error-message" role="alert">{{ $message }}</span>
        @enderror

        <div class="checkbox-container mb-4">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Emlékezz rám</label>
        </div>

        <button type="submit">Bejelentkezés</button>
    </form>
</div>
@endsection