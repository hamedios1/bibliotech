<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function store(Request $request, Book $book)
    {
        $validated = $request->validate([
            'nom_emprunteur' => 'required|string|min:2|max:255',
            'date_emprunt' => 'required|date',
        ]);

        $book->loans()->create($validated);

        return redirect()->route('books.show', $book)
            ->with('success', 'Emprunt enregistré avec succès.');
    }

    public function markReturned(Loan $loan)
{
    $loan->update([
        'date_retour' => now(),
    ]);

    return redirect()->route('books.show', $loan->book)
        ->with('success', 'Emprunt marqué comme rendu.');
}
}