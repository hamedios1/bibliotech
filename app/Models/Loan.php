<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ['nom_emprunteur', 'date_emprunt', 'date_retour', 'book_id'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
