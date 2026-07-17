<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['nom', 'nationalite', 'annee_naissance'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
