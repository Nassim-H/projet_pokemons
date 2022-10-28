<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['nom', 'prenom', 'specialite'];

    function taches() {
        return $this->belongsToMany(Pokemon::class, 'role')
            ->as('role')
            ->withPivot('role', 'date_role');
    }
}
