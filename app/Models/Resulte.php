<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resulte extends Model
{
    protected $table = 'resulte';
    public $incrementing = false;
    public $timestamps = false; 

    protected $primaryKey = null;

    protected $fillable = ['id_cours', 'id_quiz'];

    public function cours()
    {
        return $this->belongsTo(Cours::class, 'id_cours');
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'id_quiz');
    }
}
