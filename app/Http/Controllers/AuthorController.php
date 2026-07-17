<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|min:2|max:255',
            'nationalite' => 'required|string|max:255',
            'annee_naissance' => 'required|integer|min:1000|max:' . date('Y'),
        ]);

        Author::create($validated);

        return redirect()->route('authors.index')
            ->with('success', 'Auteur ajouté avec succès.');
    }

    public function show(Author $author)
    {
        $author->load('books');
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $validated = $request->validate([
            'nom' => 'required|string|min:2|max:255',
            'nationalite' => 'required|string|max:255',
            'annee_naissance' => 'required|integer|min:1000|max:' . date('Y'),
        ]);

        $author->update($validated);

        return redirect()->route('authors.index')
            ->with('success', 'Auteur modifié avec succès.');
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('authors.index')
            ->with('success', 'Auteur supprimé avec succès.');
    }
}

?>
