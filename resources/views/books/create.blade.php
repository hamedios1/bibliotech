@extends('layouts.app')

@section('content')
    <h1>Ajouter un livre</h1>

    <form method="POST" action="{{ route('books.store') }}">
        @csrf

        <label>Titre</label>
        <input type="text" name="titre" value="{{ old('titre') }}">
        @error('titre') <span>{{ $message }}</span> @enderror

        <label>ISBN</label>
        <input type="text" name="isbn" value="{{ old('isbn') }}">
        @error('isbn') <span>{{ $message }}</span> @enderror

        <label>Année</label>
        <input type="number" name="annee" value="{{ old('annee') }}">
        @error('annee') <span>{{ $message }}</span> @enderror

        <label>Résumé</label>
        <textarea name="resume">{{ old('resume') }}</textarea>

        <label>Nombre de pages</label>
        <input type="number" name="nb_pages" value="{{ old('nb_pages') }}">

        <label>État</label>
        <select name="etat">
            <option value="neuf">Neuf</option>
            <option value="bon">Bon</option>
            <option value="abime">Abîmé</option>
        </select>

        <label>Auteur</label>
        <select name="author_id">
            @foreach($authors as $author)
                <option value="{{ $author->id }}">{{ $author->nom }}</option>
            @endforeach
        </select>

        <label>Genres</label>
        @foreach($genres as $genre)
            <label>
                <input type="checkbox" name="genres[]" value="{{ $genre->id }}">
                {{ $genre->nom }}
            </label>
        @endforeach

        <button type="submit">Créer</button>
    </form>
@endsection