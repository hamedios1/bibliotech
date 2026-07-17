<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('books.create', compact('authors', 'genres'));
    }

    public function store(BookRequest $request)
    {
        $book = Book::create($request->validated());
        $book->genres()->sync($request->input('genres', []));

        return redirect()->route('books.index')
            ->with('success', 'Livre ajouté avec succès.');
    }

    public function show(Book $book)
    {
        $book->load('genres', 'loans', 'author');
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('books.edit', compact('book', 'authors', 'genres'));
    }

    public function update(BookRequest $request, Book $book)
    {
        $book->update($request->validated());
        $book->genres()->sync($request->input('genres', []));

        return redirect()->route('books.index')
            ->with('success', 'Livre modifié avec succès.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')
            ->with('success', 'Livre supprimé avec succès.');
    }
}


?>
