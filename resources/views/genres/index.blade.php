@extends('layouts.app')

@section('content')
    <h1>Genres</h1>
    <a href="{{ route('genres.create') }}" class="btn-link">Ajouter un genre</a>

    <div class="card-list">
        @forelse($genres as $genre)
            <a href="{{ route('genres.books', $genre) }}" class="card">
                <div class="card-title">{{ $genre->nom }}</div>
                <span class="card-meta">{{ $genre->books()->count() }} livre(s)</span>
            </a>
        @empty
            <p class="empty-state">Aucun genre pour le moment.</p>
        @endforelse
    </div>
@endsection