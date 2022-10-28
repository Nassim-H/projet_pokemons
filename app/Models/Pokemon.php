<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tache
 *
 * @property string $expiration
 * @property string $categorie
 * @property int $effectuee
 * @property string $description
 * @property string $url_media
 * @method static \Database\Factories\PokemonFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon whereCategorie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon whereEffectuee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon whereExpiration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon whereUpdatedAt($value)
 * @mixin
 */
class Pokemon extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function user() {
        return $this->belongsToMany(Personne::class, 'role')
            ->as('role')
            ->withPivot('role', 'date_role');
    }
}
