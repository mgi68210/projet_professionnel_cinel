<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // au lieu de Model
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Admin extends Authenticatable
{
    use HasUuids;

    protected $table = 'admins';
    protected $primaryKey = 'id_admin';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['nom', 'prenom', 'email', 'mot_de_passe'];

    //vérification du mot de passe (ce que Laravel attend)
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }
}
