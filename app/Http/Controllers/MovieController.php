<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class MovieController extends Controller
{
    private function getMovies()
{
    $path = storage_path('app/movies.json');

    if (!file_exists($path)) {
        return [];
    }

    $json = file_get_contents($path);
    return json_decode($json, true) ?? [];
}

private function saveMovies($movies)
{
    $path = storage_path('app/movies.json');
    $json = json_encode($movies, JSON_PRETTY_PRINT);
    file_put_contents($path, $json);
}

    public function index(Request $request)
{
    $allMovies = $this->getMovies();

    $genre = $request->query('genre');
    $year = $request->query('year');

    $movies = $allMovies;
    if ($genre !== null) {
        $movies = array_filter($movies, function($movie) use ($genre) {
            return strpos($movie['genre'], $genre) !== false;
        });
    }
    if ($year !== null) {
        $movies = array_filter($movies, function($movie) use ($year) {
            return $movie['year'] == $year;
        });
    }
    return view('movies.index', [
        'movies' => $movies,
        'genre' => $genre,
        'year' => $year
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

    $movies = $this->getMovies();

    // Generate a new ID
    $newId = empty($movies) ? 1 : max(array_keys($movies)) + 1;

    $movies[$newId] = [
        'id' => $newId,
        'title' => $validated['title'],
        'genre' => $validated['genre'],
        'rating' => $validated['rating'],
        'director' => $validated['director'],
        'year' => $validated['year'],
    ];

    $this->saveMovies($movies);

    return redirect()->route('movies.index')->with('success', 'Movie added successfully.');
}

    public function show(string $id)
    {
        $movies = $this->getMovies();
        if (!isset($movies[$id])){
            abort(404);
        }
        $movie = $movies[$id];
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
    $movies = $this->getMovies();
    $featuredMovie = $movies[3];
    return view('movies.show', ['movie' => $featuredMovie]);
}



}

