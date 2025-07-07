<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasUuids;

    protected $table = 'quiz'; // force Laravel à utiliser la table "quiz
    protected $primaryKey = 'id_quiz';
    protected $keyType = 'string';   
    public $incrementing = false;     

    protected $fillable = [
        'type',
        'texte_question',
        'texte_reponse',
        'id_cours'
    ];

    public function cours()
    {
        return $this->belongsTo(Cours::class, 'id_cours');
    }
}
