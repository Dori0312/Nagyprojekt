@extends('layouts.app')

@section('title', 'Főoldal és Felkapottak')

@section('content')

    <section class="topMovies">
        <h2>⭐ Felkapottak ⭐</h2>

        <div class="topMovesFelsorolva">

        </div>
    </section>

    <section class="moviesList mt-10">
        <h2>Összes Film Adatbázisból</h2>

        @if ($allMovies->count() > 0)
            <div class="movie-list">
                @foreach ($allMovies as $movie)
                    <div>
                        <a href="{{ url('movies/' . $movie->slug) }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                            {{ $movie->title }} ({{ $movie->year }})
                        </a>
                        <span class="text-gray-500 text-sm ml-2">[{{ $movie->category }}]</span>
                    </div>
                @endforeach
                </div>
        @else
            <p class="text-lg text-gray-500">Jelenleg nincs film feltöltve az adatbázisba.</p>
        @endif
        
    </section>
@endsection

<style>
    .moviesList .movie-list {
        list-style-type: none;
        padding: 0;
        max-width: 800px;
        margin: 0 auto;
    }
    .moviesList .movie-list li {
        padding: 12px;
        border-bottom: 1px solid #eee;
        background-color: #fff;
        text-align: left;
        transition: background-color 0.2s;
    }
    .moviesList .movie-list li:hover {
        background-color: #f5f5f5;
    }
</style>