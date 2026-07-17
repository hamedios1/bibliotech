@extends('layouts.app')

@section('content')
    <h1>{{ $author->nom }}</h1>
    <p>{{ $author->nationalite }} — né(e) en {{ $author->annee_naissance }}</p>

    <h2>Livres de cet auteur</h2>
    @forelse($author->books as $book)
        <div>
            <a href="{{ route('books.show', $book) }}">{{ $book->titre }}</a>
        </div>
    @empty
        <p>Aucun livre enregistré pour cet auteur.</p>
    @endforelse
@endsection