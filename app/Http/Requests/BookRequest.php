<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titre' => ['required', 'string', 'max:255'],
            'isbn' => ['required', 'string', 'max:255', 'unique:books,isbn,' . $this->book?->id],
            'annee' => ['required', 'integer'],
            'resume' => ['nullable', 'string'],
            'nb_pages' => ['required', 'integer'],
            'etat' => ['required', 'string', 'max:255'],
            'author_id' => ['required', 'exists:authors,id'],
        ];
    }
}
