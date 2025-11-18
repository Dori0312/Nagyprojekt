<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
    {{-- Itt linkeld be a CSS fájlokat --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
</head>
<body>
    <div class="login-container">
        <h1>Bejelentkezés</h1>
        
        {{-- Sikerüzenetek megjelenítése (pl. sikeres regisztráció után) --}}
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

            <div class="checkbox-container">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Emlékezz rám</label>
            </div>

            <button type="submit">Bejelentkezés</button>
        </form>

        <p>
            Még nincs fiókod? 
            <a href="{{ url('/register') }}">Regisztrálj itt!</a> 
            {{-- feltételezve, hogy /register az útvonal a regisztrációhoz --}}
        </p>
    </div>
</body>
</html>