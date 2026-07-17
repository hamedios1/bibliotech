@extends('layouts.app')

@section('content')
    <h1>{{ $book->titre }}</h1>

    <div class="form-card">
        <p><strong>Auteur :</strong> <a href="{{ route('authors.show', $book->author) }}">{{ $book->author->nom }}</a></p>
        <p><strong>Année :</strong> {{ $book->annee }}</p>
        <p><strong>Nombre de pages :</strong> {{ $book->nb_pages }}</p>
        <p><strong>État :</strong> <span class="badge badge-{{ $book->etat }}">{{ $book->etat }}</span></p>
        <p><strong>ISBN :</strong> <span class="card-meta">{{ $book->isbn }}</span></p>
        <p><strong>Résumé :</strong> {{ $book->resume }}</p>

        <p>
            <strong>Genres :</strong>
            @forelse($book->genres as $genre)
                {{ $genre->nom }}{{ !$loop->last ? ', ' : '' }}
            @empty
                Aucun genre associé.
            @endforelse
        </p>

        <a href="{{ route('books.edit', $book) }}" class="btn-link">Modifier</a>

        <form method="POST" action="{{ route('books.destroy', $book) }}" onsubmit="return confirm('Supprimer ce livre ?');" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-danger">Supprimer</button>
        </form>
    </div>

    <h2>Historique des emprunts</h2>

    @forelse($book->loans as $loan)
        <div class="loan-card">
            <span>{{ $loan->nom_emprunteur }} — {{ $loan->date_emprunt }}</span>
            @if($loan->date_retour)
                <span class="loan-stamp is-returned">Rendu le {{ $loan->date_retour }}</span>
            @else
                <span class="loan-stamp is-active">En cours</span>
            @endif
        </div>
    @empty
        <p class="empty-state">Aucun emprunt pour ce livre.</p>
    @endforelse

    <h2>Enregistrer un nouvel emprunt</h2>

    <div class="form-card">
        <form method="POST" action="{{ route('loans.store', $book) }}">
            @csrf

            <div class="field">
                <label>Nom de l'emprunteur</label>
                <input type="text" name="nom_emprunteur" value="{{ old('nom_emprunteur') }}">
                @error('nom_emprunteur') <span class="field-error">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label>Date d'emprunt</label>
                <input type="date" name="date_emprunt" value="{{ old('date_emprunt') }}">
                @error('date_emprunt') <span class="field-error">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn-submit">Enregistrer l'emprunt</button>
        </form>
    </div>
@endsection