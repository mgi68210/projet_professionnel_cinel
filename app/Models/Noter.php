<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id_utilisateur
 * @property string $id_cours
 * @property float $note_satisfaction
 * @property string|null $commentaire
 * @property string $date_remplissage
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cours $cours
 * @property-read \App\Models\Utilisateur $utilisateur
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noter query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noter whereCommentaire($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noter whereDateRemplissage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noter whereIdCours($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noter whereIdUtilisateur($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noter whereNoteSatisfaction($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noter whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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