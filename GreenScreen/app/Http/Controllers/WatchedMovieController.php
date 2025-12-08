<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\WatchedMovie; // Ez az importálva!
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class WatchedMovieController extends Controller 
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Megtekintett státusz váltása (hozzáadás/eltávolítás).
     *
     * @param  \App\Models\Movie $movie A Route Model Binding által betöltött Movie példány.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggle(Movie $movie)
    {
        $userId = Auth::id();
        
        $watchedEntry = WatchedMovie::where('user_id', $userId) 
                                     ->where('movie_id', $movie->id)
                                     ->first();

        try {
            if ($watchedEntry) {

                $watchedEntry->delete();
                $message = 'A film jelölése eltávolítva a megtekintettek listájáról.';
            } else {

                WatchedMovie::create([
                    'user_id' => $userId,
                    'movie_id' => $movie->id,
                ]);
                $message = 'A film sikeresen megjelölve megtekintettként!';
            }
            
            return back()->with('success', $message);

        } catch (\Exception $e) {

            return back()->with('error', 'Hiba történt az állapot mentésekor. Kérlek próbáld újra.');
        }
    }
}