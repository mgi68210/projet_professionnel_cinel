<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id_cours
 * @property string $titre
 * @property string|null $description
 * @property string|null $tranche_age
 * @property int|null $capacite_max
 * @property string|null $date_heure
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Noter> $noter
 * @property-read int|null $noter_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Question> $questions
 * @property-read int|null $questions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Utilisateur> $utilisateurs
 * @property-read int|null $utilisateurs_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cours newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cours newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cours query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cours whereCapaciteMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cours whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cours whereDateHeure($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cours whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cours whereIdCours($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cours whereTitre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cours whereTrancheAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cours whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Cours extends Model
{
    use HasUuids;

    protected $primaryKey = 'id_cours';
    protected $keyType = 'string';       
    public $incrementing = false;       

    protected $fillable = [
        'titre',
        'description',
        'tranche_age',
        'capacite_max',
        'date_heure'
    ];

// Un cours peut être réservé par plusieurs utilisateurs via la table "reserver"
public function utilisateurs()
{
    return $this->belongsToMany(Utilisateur::class, 'reserver', 'id_cours', 'id_utilisateur')
                ->withPivot('date_reservation', 'statut')
                ->withTimestamps();
}

// Un cours peut avoir plusieurs questionnaires associés
public function questions()
{
    return $this->hasMany(Question::class, 'id_cours', 'id_cours');
}

// Un cours peut recevoir plusieurs notes de différents utilisateurs
public function noter()
{
    return $this->hasMany(Noter::class, 'id_cours', 'id_cours');
}
}