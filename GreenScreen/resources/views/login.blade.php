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
    </style>
@endsection

@section('content')
<div class="form-card content-body">
    <h2 class="text-2xl font-bold mb-4 text-center">Bejelentkezés</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf
        
        <label for="emailcim">E-mail cím:</label>
        <input type="email" id="emailcim" name="emailcim" value="{{ old('emailcim') }}" required autofocus>
        @error('emailcim')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="jelszo">Jelszó:</label>
        <input type="password" id="jelszo" name="jelszo" required>
        @error('jelszo')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="checkbox-container mb-4">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Emlékezz rám</label>
        </div>

        <button type="submit">Bejelentkezés</button>
    </form>
</div>
@endsection
