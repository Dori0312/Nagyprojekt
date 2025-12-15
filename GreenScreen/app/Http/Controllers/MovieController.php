<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\WatchedMovie;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Collection;

class MovieController extends Controller
{

    /**
     * Megjeleníti a főoldalt, lekérve az összes filmet.
     */
    public function index()
    {
        $movies = Movie::all();
        
        return view('welcome', compact('movies'));
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('home')
                          ->with('success', 'A film sikeresen törölve!');
    }
    
    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'director' => 'required',
            'date' => 'required|integer',
            'category' => 'required',
            'description' => 'nullable'
        ]);

        Movie::create([
            'title' => $request->title,
            'director' => $request->director,
            'year' => $request->date,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        return redirect()->route('movies.create')->with('success', 'Film sikeresen hozzáadva!');
    }
    
    public function show(Movie $movie)
    {
        $average = round($movie->ratings()->avg('rating'), 1);
        
        $isWatched = false;
        
        if (Auth::check()) {

            $isWatched = WatchedMovie::where('user_id', Auth::id())
                                       ->where('movie_id', $movie->id)
                                       ->exists();
        }
        
        return view('movies.show', compact('movie', 'average', 'isWatched'));
    }

    public function rate(Request $request, Movie $movie)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:10'
        ]);

        $movie->ratings()->updateOrCreate(
            ['user_id' => auth()->id()],
            ['rating' => $request->rating]
        );

        return back()->with('success', 'Értékelés mentve!');
    }
}