@extends('layouts.app')

@section('content')
    <h1>Livres</h1>
    <a href="{{ route('books.create') }}">Ajouter un livre</a>

    @forelse($books as $book)
        <div>
            <a href="{{ route('books.show', $book) }}">{{ $book->titre }}</a>
            — {{ $book->author->nom }}
        </div>
    @empty
        <p>Aucun livre pour le moment.</p>
    @endforelse
@endsection