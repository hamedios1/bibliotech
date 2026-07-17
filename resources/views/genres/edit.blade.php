@extends('layouts.app')

@section('content')
    <h1>Modifier un genre</h1>

    <form method="POST" action="{{ route('genres.update', $genre) }}">
        @csrf
        @method('PUT')

        <label>Nom</label>
        <input type="text" name="nom" value="{{ old('nom', $genre->nom) }}">
        @error('nom') <span>{{ $message }}</span> @enderror

        <button type="submit">Modifier</button>
    </form>
@endsection