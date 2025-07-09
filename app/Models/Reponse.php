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
        'id_questionnaire',
        'reponse_choisie',
        'reponse_bonne_fausse',
    ];

//Une réponse est donnée par un seul utilisateur, 
//mais un utilisateur peut donner plusieurs réponses.
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur');
    }

// Une réponse est liée à une seule question (du questionnaire), 
// mais une question peut recevoir plusieurs réponses de différents utilisateurs.
    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class, 'id_questionnaire');
    }
}
