<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Utilisateur extends Authenticatable
{
    use HasUuids;

    protected $table = 'utilisateurs';
    protected $primaryKey = 'id_utilisateur';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'mot_de_passe',
    ];


    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }


 //Un utilisateur peut réserver plusieurs cours (relation many-to-many).
//Table pivot : reserver
public function cours()
{
    return $this->belongsToMany(Cours::class, 'reserver', 'id_utilisateur', 'id_cours')
                ->withPivot('date_reservation', 'statut')
                ->withTimestamps();
}


//Un utilisateur peut laisser plusieurs avis (notes et commentaires) sur les cours.

    public function noter()
    {
        return $this->hasMany(Noter::class, 'id_utilisateur', 'id_utilisateur');
    }


//Un utilisateur peut répondre à plusieurs questionnaires.

    public function reponses()
    {
        return $this->hasMany(Reponse::class, 'id_utilisateur', 'id_utilisateur');
    }
}