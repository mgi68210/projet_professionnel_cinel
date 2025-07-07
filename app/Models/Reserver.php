<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserver extends Model
{
    //  Nom de la table (parce qu’elle n’est pas au pluriel par défaut)
    protected $table = 'reserver';

    //  Il n’y a pas de clé "auto-incrémentée" ici
    public $incrementing = false;

    //  Pas de clé unique classique : la clé primaire est composée de 2 champs
    protected $primaryKey = null;

    //  On dit à Laravel de remplir automatiquement ces colonnes si on veut
    protected $fillable = [
        'id_utilisateur',
        'id_cours',
        'date_reservation',
        'statut'
    ];

    //  Chaque réservation appartient à 1! utilisateur
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur');
    }

    //  Chaque réservation concerne un cours
    public function cours()
    {
        return $this->belongsTo(Cours::class, 'id_cours');
    }
}
