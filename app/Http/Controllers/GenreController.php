<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }

    public function create()
    {
        return view('genres.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|min:2|max:255',
        ]);

        Genre::create($validated);

        return redirect()->route('genres.index')
            ->with('success', 'Genre ajouté avec succès.');
    }

    public function show(Genre $genre)
    {
        // Non utilisé directement : on préfère la méthode books() ci-dessous
        return redirect()->route('genres.books', $genre);
    }

    public function edit(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $validated = $request->validate([
            'nom' => 'required|string|min:2|max:255',
        ]);

        $genre->update($validated);

        return redirect()->route('genres.index')
            ->with('success', 'Genre modifié avec succès.');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect()->route('genres.index')
            ->with('success', 'Genre supprimé avec succès.');
    }

    // Méthode custom pour la route genres.books
    public function books(Genre $genre)
    {
        $genre->load('books');
        return view('genres.books', compact('genre'));
    }
}

?>