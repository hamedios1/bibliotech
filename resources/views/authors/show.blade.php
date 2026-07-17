@extends('layouts.app')

@section('content')
    <h1>{{ $author->nom }}</h1>

    <div class="form-card">
        <p><strong>Nationalité :</strong> {{ $author->nationalite }}</p>
        <p><strong>Année de naissance :</strong> {{ $author->annee_naissance }}</p>

        <a href="{{ route('authors.edit', $author) }}" class="btn-link">Modifier</a>

        <form method="POST" action="{{ route('authors.destroy', $author) }}" onsubmit="return confirm('Supprimer cet auteur ?');" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-danger">Supprimer</button>
        </form>
    </div>

    <h2>Livres de cet auteur</h2>

    <div class="card-list">
        @forelse($author->books as $book)
            <a href="{{ route('books.show', $book) }}" class="card">
                <div>
                    <div class="card-title">{{ $book->titre }}</div>
                    <div class="card-meta">{{ $book->annee }}</div>
                </div>
                <span class="badge badge-{{ $book->etat }}">{{ $book->etat }}</span>
            </a>
        @empty
            <p class="empty-state">Aucun livre enregistré pour cet auteur.</p>
        @endforelse
    </div>
@endsection