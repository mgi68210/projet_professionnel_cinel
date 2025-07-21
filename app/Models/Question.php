<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id_question
 * @property string $type
 * @property string $texte_question
 * @property string $texte_reponse
 * @property string $id_cours
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cours $cours
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Reponse> $reponses
 * @property-read int|null $reponses_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question whereIdCours($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question whereIdQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question whereTexteQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question whereTexteReponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Question whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
