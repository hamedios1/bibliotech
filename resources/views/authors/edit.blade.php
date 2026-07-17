@extends('layouts.app')

@section('content')
    <h1>Modifier un auteur</h1>

    <div class="form-card">
        <form method="POST" action="{{ route('authors.update', $author) }}">
            @csrf
            @method('PUT')

            <div class="field">
                <label>Nom</label>
                <input type="text" name="nom" value="{{ old('nom', $author->nom) }}">
                @error('nom') <span class="field-error">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label>Nationalité</label>
                <input type="text" name="nationalite" value="{{ old('nationalite', $author->nationalite) }}">
                @error('nationalite') <span class="field-error">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label>Année de naissance</label>
                <input type="number" name="annee_naissance" value="{{ old('annee_naissance', $author->annee_naissance) }}">
                @error('annee_naissance') <span class="field-error">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn-submit">Modifier</button>
        </form>
    </div>
@endsection