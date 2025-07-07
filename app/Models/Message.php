<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
    use HasUuids;

    protected $table = 'message';
    protected $primaryKey = 'id_message';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id_utilisateur',
        'objet',
        'contenu',
        'date_envoi',
        'statut',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur');
    }
}
