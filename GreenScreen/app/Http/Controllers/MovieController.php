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
}
