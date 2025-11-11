<!doctype html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GreenScreen</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body>
    <header>
        <button type="button" class="button1" onclick="location.href='register_form.html'">Regisztráció</button>
        <button type="button" class="button1" onclick="location.href='login_form.html'">Belépés</button>
    </header>
    <h1>
        <img src="pictures/logo.png" alt="Logó" class="logo">
    </h1>
    <section class="topMovies">
        <!-- Itt jeleníti meg a top filmek borítóját sorban`` -->
         <h2>⭐ Felkapottak ⭐</h2>
        <div class="topMovesFelsorolva">
            <a href="28dayslater.html" class="listed">
                <img src="film_kepek/28_nappal_kesobb.jpg" alt="28 days later">
            </a>
            <a href="deadpool.html" class="listed">
                <img src="film_kepek/deadpool.png" alt="deadpool">
            </a>
            <a href="fightclub.html" class="listed">
                <img src="film_kepek/harcosok_klubja.jpg" alt="fight club">
            </a>
            <a href="joker.html" class="listed">
                <img src="film_kepek/joker.jpg" alt="joker">
            </a>
            <a href="shrex.html" class="listed">
                <img src="film_kepek/shrek.jpg" alt="shrex">
            </a>
            <a href="elkurtuk.html" class="listed">
                <img src="film_kepek/elkurtuk.jpg" alt="elkurtuk">
            </a>
        </div>
    </section>
    <section class="moviesList">
        <!-- Itt jeleníti meg a filmeket az adatbázisból -->
    </section>
</body>
</html>