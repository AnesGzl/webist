<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exemption extends Model
{
    protected $table = 'exemptions';
    public $timestamps = true;
    protected $fillable = [
        'matricule', 'nom', 'prenom', 'motif', 'date_debut', 'date_fin'
    ];
    public function eleve()
    {
        return $this->belongsTo(Eleve::class, 'matricule', 'matricule');
    }
}
