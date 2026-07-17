@extends('layouts.app')

@section('content')
    <h1>Genres</h1>
    <a href="{{ route('genres.create') }}">Ajouter un genre</a>

    @forelse($genres as $genre)
        <div>
            <a href="{{ route('genres.books', $genre) }}">{{ $genre->nom }}</a>
        </div>
    @empty
        <p>Aucun genre pour le moment.</p>
    @endforelse
@endsection