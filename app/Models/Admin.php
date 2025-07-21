<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * @property string $id_admin
 * @property string $nom
 * @property string $prenom
 * @property string $email
 * @property string $mot_de_passe
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereIdAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereMotDePasse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin wherePrenom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
