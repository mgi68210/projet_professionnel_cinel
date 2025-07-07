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

    public function utilisateurs()
    {
        return $this->belongsToMany(Utilisateur::class, 'reserver', 'id_cours', 'id_utilisateur')
                    ->withPivot('date_reservation', 'statut')
                    ->withTimestamps();
    }

    public function quiz()
    {
        return $this->hasMany(Quiz::class, 'id_cours');
    }

    public function notes()
    {
        return $this->hasMany(Noter::class, 'id_cours');
    }
}
