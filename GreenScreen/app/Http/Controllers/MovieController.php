<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Collection;

class MovieController extends Controller
{
    /**
     * Megjeleníti a főoldalt, lekérve a top 6 filmet és a teljes listát (Mock adatokkal).
     */
    public function index()
    {
        // Mock adatok a Top filmekhez (6 db)
        $topMovies = collect([
            (object)['title' => '28 days later', 'slug' => '28dayslater', 'image_path' => 'film_kepek/28_nappal_kesobb.jpg'],
            (object)['title' => 'Deadpool', 'slug' => 'deadpool', 'image_path' => 'film_kepek/deadpool.png'],
            (object)['title' => 'Fight Club', 'slug' => 'fightclub', 'image_path' => 'film_kepek/harcosok_klubja.jpg'],
            (object)['title' => 'Joker', 'slug' => 'joker', 'image_path' => 'film_kepek/joker.jpg'],
            (object)['title' => 'Shrek', 'slug' => 'shrek', 'image_path' => 'film_kepek/shrek.jpg'],
            (object)['title' => 'Elkurtuk', 'slug' => 'elkurtuk', 'image_path' => 'film_kepek/elkurtuk.jpg'],
        ]);

        // Mock adatok a teljes film listához
        $allMovies = collect([
            (object)['title' => 'Matrix', 'slug' => 'matrix', 'year' => 1999, 'category' => 'Scifi'],
            (object)['title' => 'Ponyvaregény', 'slug' => 'pulpfiction', 'year' => 1994, 'category' => 'Krimi'],
        ]);

        // Átadja a $topMovies és $allMovies változókat a welcome.blade.php-nak
        return view('welcome', compact('topMovies', 'allMovies'));
    }
    
    // -----------------------------------------------------------------------
    // A KORÁBBI METÓDUSOK ITT MARADNAK:
    // -----------------------------------------------------------------------

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

        return view('movies.show', compact('movie', 'average'));
    }

    public function rate(Request $request, Movie $movie)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:10'
        ]);

        // Ha a user már értékelt → update
        $movie->ratings()->updateOrCreate(
            ['user_id' => auth()->id()],
            ['rating' => $request->rating]
        );

        return back()->with('success', 'Értékelés mentve!');
    }

}