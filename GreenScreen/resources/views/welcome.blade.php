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

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cím</th>
            <th>Év</th>
            <th>Művelet</th>
        </tr>
    </thead>
    <tbody>
        @foreach($movies as $movie)
        <tr>
            <td>{{ $movie->id }}</td>
            <td>{{ $movie->title }}</td>
            <td>{{ $movie->year }}</td>

            <td>
                <form action="{{ route('movies.destroy', $movie) }}" method="POST" onsubmit="return confirm('Biztos törlöd?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Törlés</button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
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