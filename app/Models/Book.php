<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['titre', 'isbn', 'annee', 'resume', 'nb_pages', 'etat', 'author_id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

}
