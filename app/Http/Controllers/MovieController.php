<?php

namespace App\Http\Controllers;

use App\Models\Genes;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('genes')->get();
        return view('movies.index', compact('movies'));
    }

    public function show($id)
    {
        $movie = Movie::with('genes')->findOrFail($id);
        return view('movies.show', compact('movie'));
    }

    public function create()
    {
        $genes = Genes::all();
        return view('movies.create', compact('genes'));
    }

    public function store(Request $request)
    {
        Movie::create($request->all());
        return redirect()->route('movies.index')->with('success', 'Movie updated successfully!');
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $genes = Genes::all();
        return view('movies.edit', compact('movie', 'genes'));
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->update($request->all());
        return redirect()->route('movies.index')->with('success', 'Movie updated successfully!');
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Movie Deleted successfully!');;
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $movies = Movie::where('title', 'LIKE', "%$keyword%")->with('genes')->get();
        return view('movies.index', compact('movies'));
    }
}
