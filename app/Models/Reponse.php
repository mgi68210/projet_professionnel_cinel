<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    protected $table = 'reponses';
    protected $keyType = 'int';
    public $incrementing = true; // car tu as un champ auto-incrémenté id
    public $timestamps = true;

    protected $fillable = [
        'id_utilisateur',
        'id_question',
        'reponse_choisie',
        'reponse_bonne_fausse',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur', 'id_utilisateur');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'id_question', 'id_question');
    }
}
