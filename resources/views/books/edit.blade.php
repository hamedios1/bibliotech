@extends('layouts.app')

@section('content')
    <h1>Modifier un livre</h1>

    <form method="POST" action="{{ route('books.update', $book) }}">
        @csrf
        @method('PUT')

        <label>Titre</label>
        <input type="text" name="titre" value="{{ old('titre', $book->titre) }}">
        @error('titre') <span>{{ $message }}</span> @enderror

        <label>ISBN</label>
        <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}">
        @error('isbn') <span>{{ $message }}</span> @enderror

        <label>Année</label>
        <input type="number" name="annee" value="{{ old('annee', $book->annee) }}">
        @error('annee') <span>{{ $message }}</span> @enderror

        <label>Résumé</label>
        <textarea name="resume">{{ old('resume', $book->resume) }}</textarea>

        <label>Nombre de pages</label>
        <input type="number" name="nb_pages" value="{{ old('nb_pages', $book->nb_pages) }}">

        <label>État</label>
        <select name="etat">
            <option value="neuf" @selected(old('etat', $book->etat) == 'neuf')>Neuf</option>
            <option value="bon" @selected(old('etat', $book->etat) == 'bon')>Bon</option>
            <option value="abime" @selected(old('etat', $book->etat) == 'abime')>Abîmé</option>
        </select>

        <label>Auteur</label>
        <select name="author_id">
            @foreach($authors as $author)
                <option value="{{ $author->id }}" @selected(old('author_id', $book->author_id) == $author->id)>
                    {{ $author->nom }}
                </option>
            @endforeach
        </select>

        <label>Genres</label>
        @foreach($genres as $genre)
            <label>
                <input type="checkbox" name="genres[]" value="{{ $genre->id }}"
                    @checked($book->genres->contains($genre->id))>
                {{ $genre->nom }}
            </label>
        @endforeach

        <button type="submit">Modifier</button>
    </form>
@endsection