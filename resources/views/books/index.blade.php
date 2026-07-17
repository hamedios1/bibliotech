@extends('layouts.app')

@section('content')
    <h1>Livres</h1>
    <a href="{{ route('books.create') }}" class="btn-link">Ajouter un livre</a>

    <div class="card-list">
        @forelse($books as $book)
            <a href="{{ route('books.show', $book) }}" class="card">
                <div>
                    <div class="card-title">{{ $book->titre }}</div>
                    <div class="card-meta">{{ $book->author->nom }} · {{ $book->annee }}</div>
                </div>
                <span class="badge badge-{{ $book->etat }}">{{ $book->etat }}</span>
            </a>
        @empty
            <p class="empty-state">Aucun livre pour le moment.</p>
        @endforelse
    </div>
@endsection