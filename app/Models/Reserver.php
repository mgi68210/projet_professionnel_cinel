<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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