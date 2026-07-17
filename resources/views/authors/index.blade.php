@extends('layouts.app')

@section('content')
    <h1>Auteurs</h1>
    <a href="{{ route('authors.create') }}">Ajouter un auteur</a>

    @forelse($authors as $author)
        <div>
            <a href="{{ route('authors.show', $author) }}">{{ $author->nom }}</a>
            — {{ $author->nationalite }} ({{ $author->annee_naissance }})
        </div>
    @empty
        <p>Aucun auteur pour le moment.</p>
    @endforelse
@endsection