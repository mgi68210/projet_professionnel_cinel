<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Admin extends Authenticatable
{
    use HasUuids;

    protected $table = 'admins';
    protected $primaryKey = 'id_admin';
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
}
