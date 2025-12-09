<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Feltételezzük, hogy létezik egy Movie modell a modellek mappában
// use App\Models\Movie; 

class TopMoviesController extends Controller
{
    /**
     * Megjeleníti a főoldalt a legnépszerűbb filmekkel.
     * Ez a metódus a 'movies' táblából lekérdezi a 6 legtöbb látogatóval rendelkező filmet.
     * * @return \Illuminate\View\View
     */
    public function index()
    {
        // ----------------------------------------------------------------------
        // VALÓDI ADATBÁZIS LEKÉRDEZÉS (amikor már létezik a Movie modell és tábla):
        // ----------------------------------------------------------------------
        /*
        $topMovies = Movie::orderBy('visitors', 'desc') // Rendezi a látogatók száma szerint csökkenő sorrendben
                           ->take(6)                   // Csak 6 elemet kér le
                           ->get();                    // Lekéri az adatokat
        */

        // ----------------------------------------------------------------------
        // MOCK ADATOK (amíg nincs adatbázis)
        // ----------------------------------------------------------------------
        $topMovies = collect([
            (object)['title' => '28 days later', 'slug' => '28dayslater', 'image_path' => 'film_kepek/28_nappal_kesobb.jpg'],
            (object)['title' => 'Deadpool', 'slug' => 'deadpool', 'image_path' => 'film_kepek/deadpool.png'],
            (object)['title' => 'Fight Club', 'slug' => 'fightclub', 'image_path' => 'film_kepek/harcosok_klubja.jpg'],
            (object)['title' => 'Joker', 'slug' => 'joker', 'image_path' => 'film_kepek/joker.jpg'],
            (object)['title' => 'Shrek', 'slug' => 'shrek', 'image_path' => 'film_kepek/shrek.jpg'],
            (object)['title' => 'Elk*rtuk', 'slug' => 'elkurtuk', 'image_path' => 'film_kepek/elkurtuk.jpg'],
        ]);
        
        // Visszaadja a welcome.blade.php-t, és átadja neki a $topMovies változót
        return view('welcome', compact('topMovies'));
    }
}