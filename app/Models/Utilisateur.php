<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;



/**
 * @property string $id_utilisateur
 * @property string $nom
 * @property string $prenom
 * @property string $email
 * @property string $mot_de_passe
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cours> $cours
 * @property-read int|null $cours_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Noter> $noter
 * @property-read int|null $noter_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Reponse> $reponses
 * @property-read int|null $reponses_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereIdUtilisateur($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereMotDePasse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur wherePrenom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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