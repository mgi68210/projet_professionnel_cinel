<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * @property string $id_utilisateur
 * @property string $id_question
 * @property string $reponse_choisie
 * @property int $reponse_bonne_fausse
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Question $question
 * @property-read \App\Models\Utilisateur $utilisateur
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reponse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reponse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reponse query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reponse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reponse whereIdQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reponse whereIdUtilisateur($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reponse whereReponseBonneFausse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reponse whereReponseChoisie($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reponse whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
