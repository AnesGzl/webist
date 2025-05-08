<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListeRdv extends Model
{
    protected $table = 'liste_rdvs';
    public $timestamps = true;
    public $incrementing = false;
    protected $fillable = [
        'matricule',
        'motif',
        'service',
        'date'
    ];

    public function eleve()
    {
        return $this->belongsTo(Eleve::class, 'matricule', 'matricule');
    }
}
