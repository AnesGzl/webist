<?php


    namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['matricule', 'validated_at'];

    protected $casts = [
        'valider' => 'boolean',
        'validated_at' => 'datetime',
    ];
    public function eleve()
    {
        return $this->belongsTo(Eleve::class, 'matricule', 'matricule');
    }
}


