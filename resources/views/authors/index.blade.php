@extends('layouts.app')

@section('content')
    <h1>Auteurs</h1>
    <a href="{{ route('authors.create') }}" class="btn-link">Ajouter un auteur</a>

    <div class="card-list">
        @forelse($authors as $author)
            <a href="{{ route('authors.show', $author) }}" class="card">
                <div>
                    <div class="card-title">{{ $author->nom }}</div>
                    <div class="card-meta">{{ $author->nationalite }} · né(e) en {{ $author->annee_naissance }}</div>
                </div>
            </a>
        @empty
            <p class="empty-state">Aucun auteur pour le moment.</p>
        @endforelse
    </div>
@endsection