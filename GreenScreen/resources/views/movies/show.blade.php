@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1 class="mb-4">{{ $movie->title }} ({{ $movie->year }})</h1>

            <div class="card mb-4">
                <div class="card-body">
                    <h2>Film adatai</h2>
                    <p><strong>Rendező:</strong> {{ $movie->director }}</p>
                    <p><strong>Kategória:</strong> {{ $movie->category }}</p>
                    <p><strong>Leírás:</strong> {{ $movie->description }}</p>
                    <p><strong>Átlagos Értékelés:</strong> 
                        @if (isset($average))
                            {{ $average }} / 10
                        @else
                            Még nincs értékelve
                        @endif
                    </p>
                </div>
            </div>

            @auth
                <div class="card my-4">
                    <div class="card-body">
                        <h3>Értékelés</h3>
                        
                        @if (session('success'))
                            <div style="color: green; font-weight: bold;">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('movies.rate', $movie) }}" method="POST">
                            @csrf
                            
                            <label for="rating">Értékeld a filmet (1-10):</label>
                            <input type="number" name="rating" id="rating" min="1" max="10" required 
                                   value="{{ old('rating') }}"> 
                            
                            @error('rating')
                                <div style="color: red; font-weight: bold;">{{ $message }}</div>
                            @enderror
                            
                            <button type="submit">Értékelés elküldése</button>
                        </form>
                    </div>
                </div>
            @else
                <p class="text-center" style="font-weight: bold;">
                    <a href="{{ route('login') }}">Jelentkezz be</a> az értékeléshez!
                </p>
            @endauth
            </div>
    </div>
</div>
@endsection