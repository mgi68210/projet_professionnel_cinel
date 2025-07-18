<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noter extends Model
{
    protected $table = 'noter';

    public $incrementing = false;          
    protected $primaryKey = null;          
    public $timestamps = true;            

    protected $fillable = [
        'id_utilisateur',
        'id_cours',
        'note_satisfaction',
        'commentaire',
        'date_remplissage',
    ];

// Chaque note appartient à un utilisateur (un utilisateur peut noter plusieurs cours)
public function utilisateur()
{
    return $this->belongsTo(Utilisateur::class, 'id_utilisateur', 'id_utilisateur');
}

// Chaque note est liée à un cours (un cours peut être noté par plusieurs utilisateurs)
public function cours()
{
    return $this->belongsTo(Cours::class, 'id_cours', 'id_cours');
}
}