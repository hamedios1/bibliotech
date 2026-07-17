@extends('layouts.app')

@section('content')
    <h1>{{ $book->titre }}</h1>

    <p>Auteur : <a href="{{ route('authors.show', $book->author) }}">{{ $book->author->nom }}</a></p>
    <p>Année : {{ $book->annee }}</p>
    <p>Nombre de pages : {{ $book->nb_pages }}</p>
    <p>État : {{ $book->etat }}</p>
    <p>ISBN : {{ $book->isbn }}</p>
    <p>Résumé : {{ $book->resume }}</p>

    <p>
        Genres :
        @forelse($book->genres as $genre)
            {{ $genre->nom }}{{ !$loop->last ? ', ' : '' }}
        @empty
            Aucun genre associé.
        @endforelse
    </p>

    <a href="{{ route('books.edit', $book) }}">Modifier</a>

    <form method="POST" action="{{ route('books.destroy', $book) }}" onsubmit="return confirm('Supprimer ce livre ?');">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
    </form>

    <hr>

    <h2>Historique des emprunts</h2>

    @forelse($book->loans as $loan)
        <div>
            {{ $loan->nom_emprunteur }} —
            emprunté le {{ $loan->date_emprunt }}
            @if($loan->date_retour)
                — rendu le {{ $loan->date_retour }}
            @else
                — non rendu
            @endif
        </div>
    @empty
        <p>Aucun emprunt pour ce livre.</p>
    @endforelse

    <h3>Enregistrer un nouvel emprunt</h3>

    <form method="POST" action="{{ route('loans.store', $book) }}">
        @csrf

        <label>Nom de l'emprunteur</label>
        <input type="text" name="nom_emprunteur" value="{{ old('nom_emprunteur') }}">
        @error('nom_emprunteur') <span>{{ $message }}</span> @enderror

        <label>Date d'emprunt</label>
        <input type="date" name="date_emprunt" value="{{ old('date_emprunt') }}">
        @error('date_emprunt') <span>{{ $message }}</span> @enderror

        <button type="submit">Enregistrer l'emprunt</button>
    </form>
@endsection