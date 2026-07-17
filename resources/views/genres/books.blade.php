@extends('layouts.app')

@section('content')
    <h1>Livres du genre : {{ $genre->nom }}</h1>

    <div class="card-list">
        @forelse($genre->books as $book)
            <a href="{{ route('books.show', $book) }}" class="card">
                <div>
                    <div class="card-title">{{ $book->titre }}</div>
                    <div class="card-meta">{{ $book->author->nom }}</div>
                </div>
                <span class="badge badge-{{ $book->etat }}">{{ $book->etat }}</span>
            </a>
        @empty
            <p class="empty-state">Aucun livre dans ce genre.</p>
        @endforelse
    </div>
@endsection