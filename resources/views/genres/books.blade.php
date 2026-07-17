@extends('layouts.app')

@section('content')
    <h1>Livres du genre : {{ $genre->nom }}</h1>

    @forelse($genre->books as $book)
        <div>
            <a href="{{ route('books.show', $book) }}">{{ $book->titre }}</a>
            — {{ $book->author->nom }}
        </div>
    @empty
        <p>Aucun livre dans ce genre.</p>
    @endforelse
@endsection