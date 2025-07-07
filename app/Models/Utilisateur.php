<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // au lieu de Model
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Utilisateur extends Authenticatable
{
    use HasUuids;

    protected $table = 'utilisateurs';
    protected $primaryKey = 'id_utilisateur';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['nom', 'prenom', 'email', 'mot_de_passe'];

    // Le champs password par defaut (ce que Laravel attend)
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

    public function cours()
{
    return $this->belongsToMany(Cours::class, 'reserver', 'id_utilisateur', 'id_cours')
                ->withPivot('date_reservation', 'statut')
                ->withTimestamps();
}

}
