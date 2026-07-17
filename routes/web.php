<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LoanController;

// Filtre : tous les livres d'un genre donné
Route::get('/genres/{genre}/books', [GenreController::class, 'books'])->name('genres.books');

// Enregistrer un nouvel emprunt pour un livre
Route::post('/books/{book}/loans', [LoanController::class, 'store'])->name('loans.store');

Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);
Route::resource('genres', GenreController::class);
