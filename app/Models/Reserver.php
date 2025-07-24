<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id_utilisateur
 * @property string $id_cours
 * @property string $date_reservation
 * @property string|null $statut
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cours $cours
 * @property-read \App\Models\Utilisateur $utilisateur
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reserver newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reserver newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reserver query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reserver whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reserver whereDateReservation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reserver whereIdCours($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reserver whereIdUtilisateur($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reserver whereStatut($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reserver whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Reserver extends Model
{
    protected $table = 'reserver';

    public $incrementing = false;
    protected $primaryKey = null;

    protected $keyType = 'string';

    protected $fillable = [
        'id_utilisateur',
        'id_cours',
        'date_reservation',
        'statut',
    ];

// Une réservation appartient à un seul utilisateur
public function utilisateur()
{
    return $this->belongsTo(Utilisateur::class, 'id_utilisateur');
}

// Une réservation concerne un seul cours
public function cours()
{
    return $this->belongsTo(Cours::class, 'id_cours');
}
}