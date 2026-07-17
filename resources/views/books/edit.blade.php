@extends('layouts.app')

@section('content')
    <h1>Modifier un livre</h1>

    <div class="form-card">
        <form method="POST" action="{{ route('books.update', $book) }}">
            @csrf
            @method('PUT')

            <div class="field">
                <label>Titre</label>
                <input type="text" name="titre" value="{{ old('titre', $book->titre) }}">
                @error('titre') <span class="field-error">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label>ISBN</label>
                <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}">
                @error('isbn') <span class="field-error">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label>Année</label>
                <input type="number" name="annee" value="{{ old('annee', $book->annee) }}">
                @error('annee') <span class="field-error">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label>Résumé</label>
                <textarea name="resume">{{ old('resume', $book->resume) }}</textarea>
                @error('resume') <span class="field-error">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label>Nombre de pages</label>
                <input type="number" name="nb_pages" value="{{ old('nb_pages', $book->nb_pages) }}">
                @error('nb_pages') <span class="field-error">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label>État</label>
                <select name="etat">
                    <option value="neuf" @selected(old('etat', $book->etat) == 'neuf')>Neuf</option>
                    <option value="bon" @selected(old('etat', $book->etat) == 'bon')>Bon</option>
                    <option value="abime" @selected(old('etat', $book->etat) == 'abime')>Abîmé</option>
                </select>
                @error('etat') <span class="field-error">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label>Auteur</label>
                <select name="author_id">
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" @selected(old('author_id', $book->author_id) == $author->id)>
                            {{ $author->nom }}
                        </option>
                    @endforeach
                </select>
                @error('author_id') <span class="field-error">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label>Genres</label>
                <div class="checkbox-group">
                    @foreach($genres as $genre)
                        <label>
                            <input type="checkbox" name="genres[]" value="{{ $genre->id }}"
                                @checked($book->genres->contains($genre->id))>
                            {{ $genre->nom }}
                        </label>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn-submit">Modifier</button>
        </form>
    </div>
@endsection