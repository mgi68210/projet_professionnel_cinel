<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noter extends Model
{

    protected $table = 'noter';

    public $incrementing = false;

    protected $primaryKey = null;

    protected $fillable = [
        'id_utilisateur',
        'id_cours',
        'note_satisfaction',
        'commentaire',
        'date_remplissage'
    ];

    // Relations vers les autres modèles
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur');
    }

    public function cours()
    {
        return $this->belongsTo(Cours::class, 'id_cours');
    }
}
