@extends('layouts.app')

@section('content')
    <h1>Ajouter un genre</h1>

    <div class="form-card">
        <form method="POST" action="{{ route('genres.store') }}">
            @csrf

            <div class="field">
                <label>Nom</label>
                <input type="text" name="nom" value="{{ old('nom') }}">
                @error('nom') <span class="field-error">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn-submit">Créer</button>
        </form>
    </div>
@endsection