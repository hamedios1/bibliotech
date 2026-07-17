@extends('layouts.app')

@section('content')
    <h1>Modifier un auteur</h1>

    <form method="POST" action="{{ route('authors.update', $author) }}">
        @csrf
        @method('PUT')

        <label>Nom</label>
        <input type="text" name="nom" value="{{ old('nom', $author->nom) }}">
        @error('nom') <span>{{ $message }}</span> @enderror

        <label>Nationalité</label>
        <input type="text" name="nationalite" value="{{ old('nationalite', $author->nationalite) }}">
        @error('nationalite') <span>{{ $message }}</span> @enderror

        <label>Année de naissance</label>
        <input type="number" name="annee_naissance" value="{{ old('annee_naissance', $author->annee_naissance) }}">
        @error('annee_naissance') <span>{{ $message }}</span> @enderror

        <button type="submit">Modifier</button>
    </form>
@endsection