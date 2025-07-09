<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasUuids;

    protected $table = 'questionnaires'; 
    protected $primaryKey = 'id_questionnaire';
    protected $keyType = 'string';   
    public $incrementing = false;     

    protected $fillable = [
        'type',
        'texte_question',
        'texte_reponse',
        'id_cours'
    ];

// Chaque questionnaire appartient à un cours
public function cours()
{
    return $this->belongsTo(Cours::class, 'id_cours');
}
}
