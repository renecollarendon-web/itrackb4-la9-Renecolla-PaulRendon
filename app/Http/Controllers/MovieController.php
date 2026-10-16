<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    
    public function index(Request $request)
{
    $genre = $request->query('genre');
    $year = $request->query('year');

    $query = Movie::query();

    if ($genre !== null) {
        $query->where('genre', $genre);
    }

    if ($year !== null) {
        $query->where('year', $year);
    }

    $movies = $query->get();

    return view('movies.index', [
        'movies' => $movies,
        'genre' => $genre,
        'year' => $year,
    ]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('movies.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'genre' => 'required|in:Romance,Drama,Fantasy,Action',
            'rating' => 'required|numeric',
            'director' => 'required|max:100',
            'year' => 'required|numeric',
        ]);

        Movie::create([
            'title' => $validated['title'],
            'genre' => $validated['genre'],
            'rating' => $validated['rating'],
            'director' => $validated['director'],
            'year' => $validated['year'],
            'is_featured' => false,
        ]);

        return redirect()->route('movies.index')->with('success', 'Movie added successfully.');
    }


    public function show(string $id)
{
    $movie = Movie::findOrFail($id);

    return view('movies.show', ['movie' => $movie]);
}

    public function edit(string $id)
    {

    }

    public function update(Request $request, string $id)
    {

    }

    public function destroy(string $id)
    {

    }
public function featured()
    {
        $movie = Movie::where('is_featured', true)->first()
            ?? Movie::first();

        return view('movies.show', ['movie' => $movie]);
    }
}

