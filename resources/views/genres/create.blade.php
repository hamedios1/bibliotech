@extends('layouts.app')

@section('content')
    <h1>Ajouter un genre</h1>

    <form method="POST" action="{{ route('genres.store') }}">
        @csrf

        <label>Nom</label>
        <input type="text" name="nom" value="{{ old('nom') }}">
        @error('nom') <span>{{ $message }}</span> @enderror

        <button type="submit">Créer</button>
    </form>
@endsection