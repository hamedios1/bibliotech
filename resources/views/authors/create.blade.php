@extends('layouts.app')

@section('content')
    <h1>Ajouter un auteur</h1>

    <form method="POST" action="{{ route('authors.store') }}">
        @csrf

        <label>Nom</label>
        <input type="text" name="nom" value="{{ old('nom') }}">
        @error('nom') <span>{{ $message }}</span> @enderror

        <label>Nationalité</label>
        <input type="text" name="nationalite" value="{{ old('nationalite') }}">
        @error('nationalite') <span>{{ $message }}</span> @enderror

        <label>Année de naissance</label>
        <input type="number" name="annee_naissance" value="{{ old('annee_naissance') }}">
        @error('annee_naissance') <span>{{ $message }}</span> @enderror

        <button type="submit">Créer</button>
    </form>
@endsection