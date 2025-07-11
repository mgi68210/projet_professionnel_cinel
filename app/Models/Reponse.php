<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Reponse extends Model
{
    use HasUuids;

    protected $table = 'reponses';
    public $incrementing = false;
    protected $keyType = 'string'; 
    protected $primaryKey = null;
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
