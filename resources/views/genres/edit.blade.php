@extends('layouts.app')

@section('content')
    <h1>Modifier un genre</h1>

    <div class="form-card">
        <form method="POST" action="{{ route('genres.update', $genre) }}">
            @csrf
            @method('PUT')

            <div class="field">
                <label>Nom</label>
                <input type="text" name="nom" value="{{ old('nom', $genre->nom) }}">
                @error('nom') <span class="field-error">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn-submit">Modifier</button>
        </form>
    </div>
@endsection