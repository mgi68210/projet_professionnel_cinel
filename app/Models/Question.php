<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasUuids;

    protected $table = 'questions';
    protected $primaryKey = 'id_question';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'type',
        'texte_question',
        'texte_reponse',
        'id_cours',
    ];

    // Une question appartient à un cours
    public function cours()
    {
    return $this->belongsTo(Cours::class, 'id_cours', 'id_cours');
    }


    // Une question peut avoir plusieurs réponses
    public function reponses()
    {
    return $this->hasMany(Reponse::class, 'id_question', 'id_question');
    }

}
