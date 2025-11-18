@extends('layouts.app')

@section('content')
<h1>
    <img src="{{ asset('pictures/logo.png') }}" alt="Logó" class="logo">
</h1>

<section>
    <h2>Film Hozzáadása</h2>

    <form method="POST" action="{{ route('movies.store') }}">
        @csrf

        <label for="title">Cím:</label><br>
        <input type="text" name="title" id="title" required><br>

        <label for="director">Rendező:</label><br>
        <input type="text" name="director" id="director" required><br>

        <label for="date">Kiadás éve: </label><br>
        <input type="number" name="date" id="date" min="1900" required><br>

        <label for="category">Kategória:</label><br>
        <select id="category" name="category" required>
            <option value="action">Akció</option>
            <option value="horror">Horror</option>
            <option value="romantic">Romantikus</option>
            <option value="scifi">Science Fiction</option>
            <option value="documentary">Dokumentum</option>
            <option value="drama">Dráma</option>
            <option value="adventure">Kaland</option>
            <option value="comedy">Komédia</option>
            <option value="thriller">Thriller</option>
            <option value="crime">Krimi</option>
            <option value="fantasy">Fantasy</option>
            <option value="western">Western</option>
        </select><br><br>

        <label for="description">Leírás:</label><br>
        <textarea id="description" name="description" rows="5" cols="50"></textarea><br><br>

        <div style="display: flex; justify-content: space-evenly; gap: 10px;">
            <button type="submit" class="button1">Hozzáadás</button>
            <a href="/home" class="button1">Vissza</a>
        </div>
    </form>
</section>
@endsection
