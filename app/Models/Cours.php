<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

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
public function questionnaires()
{
    return $this->hasMany(Questionnaire::class, 'id_cours', 'id_cours');
}

// Un cours peut recevoir plusieurs notes de différents utilisateurs
public function notes()
{
    return $this->hasMany(Noter::class, 'id_cours', 'id_cours');
}
}