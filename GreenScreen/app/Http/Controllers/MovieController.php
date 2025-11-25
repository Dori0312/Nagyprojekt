<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
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
